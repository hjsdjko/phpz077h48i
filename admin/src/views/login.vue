<template>
  <div>
    <div class="container" :style='{"minHeight":"100vh","alignItems":"center","background":"url(http://codegen.caihongy.cn/20231102/3703718595294b8ab9b3afeea844de31.jpg)","display":"flex","width":"100%","backgroundSize":"100% 100%","backgroundPosition":"center center","backgroundRepeat":"no-repeat","justifyContent":"flex-start"}'>
      <el-form :style='{"border":"0px solid #f6f6f6","padding":"20px 5vw 100px","margin":"50px 0 50px 8vw","borderRadius":"8px","textAlign":"center","flexWrap":"wrap","background":"rgba(0,0,0,.5)","display":"flex","width":"35vw","fontSize":"14px","position":"relative","height":"auto"}'>
        <div v-if="true" :style='{"padding":"0 0 0 100px","margin":"20px auto 30px","borderColor":"#ddd","color":"#fff","textAlign":"left","display":"inline-block","background":"url(http://codegen.caihongy.cn/20231102/8510e68829374383b97a281acf720a23.png) no-repeat left center /  80px","borderWidth":"0px","width":"100%","lineHeight":"40px","fontSize":"20px","borderStyle":"solid","fontWeight":"500"}' class="title-container">助农生鲜销售系统的设计与实现登录</div>
        <div v-if="loginType==1" class="list-item" :style='{"margin":"0 auto 30px","alignItems":"center","flexWrap":"wrap","display":"flex","width":"100%","position":"relative","order":"2"}'>
          <div v-if="false" class="lable" :style='{"width":"100%","lineHeight":"44px","fontSize":"inherit","color":"#666","textAlign":"left"}'>用户名：</div>
          <input :style='{"border":"0px solid #eee","padding":"0 10px","boxShadow":"0 0 0px rgba(64, 158, 255, .3)","outline":"0px solid #eee","color":"#666","outlineOffset":"0px","borderRadius":"30px","background":"#f3f3f3","width":"360px","fontSize":"inherit","height":"40px"}' placeholder="请输入用户名" name="username" type="text" v-model="rulesForm.username">
        </div>
        <div v-if="loginType==1" class="list-item" :style='{"margin":"0 auto 30px","alignItems":"center","flexWrap":"wrap","display":"flex","width":"100%","position":"relative","order":"2"}'>
          <div v-if="false" class="lable" :style='{"width":"100%","lineHeight":"44px","fontSize":"inherit","color":"#666","textAlign":"left"}'>密码：</div>
          <input :style='{"border":"0px solid #eee","padding":"0 10px","boxShadow":"0 0 0px rgba(64, 158, 255, .3)","outline":"0px solid #eee","color":"#666","outlineOffset":"0px","borderRadius":"30px","background":"#f3f3f3","width":"360px","fontSize":"inherit","height":"40px"}' placeholder="请输入密码" name="password" type="password" v-model="rulesForm.password">
        </div>

		<div class="list-item select" :style='{"margin":"0 auto 30px","alignItems":"center","flexWrap":"wrap","display":"flex","width":"100%","position":"relative","order":"2"}' v-if="roles.length>1">
			<div v-if="false" class="lable" :style='{"width":"100%","lineHeight":"44px","fontSize":"inherit","color":"#666","textAlign":"left"}'>角色：</div>
		  <el-select v-model="rulesForm.role" placeholder="请选择角色">
		    <el-option v-if="loginType==1||(loginType==2&&item.roleName!='管理员')" v-for="item in roles" :key="item.roleName" :label="item.roleName" :value="item.roleName" />
		  </el-select>
		</div>

		
        <div :style='{"margin":"10px auto 30px","alignItems":"center","flexWrap":"wrap","display":"flex","width":"100%","fontSize":"16px","justifyContent":"flex-start"}'>
          <el-button v-if="loginType==1" :style='{"border":"0","cursor":"pointer","padding":"0 20px","margin":"0 auto 20px","color":"#fff","textAlign":"center","bottom":"20px","minWidth":"140px","outline":"none","borderRadius":"30px","background":"#7c3ef3","width":"auto","fontSize":"16px","position":"absolute","fontWeight":"600","height":"40px"}' type="primary" @click="login()" class="loginInBt">登录</el-button>
          <el-button :style='{"cursor":"pointer","padding":"0 20px 0 0","margin":"0 20px 10px 0","borderColor":"#eee","color":"#fff","borderRadius":"0px","background":"none","borderWidth":"0 1px 0 0","width":"auto","fontSize":"inherit","borderStyle":"solid","fontWeight":"500","height":"auto"}' type="primary" @click="register('shangjia')" class="register">注册商家</el-button>
        </div>
      </el-form>

    </div>
  </div>
</template>
<script>
import menu from "@/utils/menu";
export default {
  data() {
    return {
		verifyCheck2: false,
		flag: false,
      baseUrl:this.$base.url,
      loginType: 1,
      rulesForm: {
        username: "",
        password: "",
        role: "",
      },
      menus: [],
      roles: [],
      tableName: "",
    };
  },
  mounted() {
    this.getMenu();

  },
  created() {

  },
  destroyed() {
	    },
  components: {
  },
  methods: {
    getMenu() {
      let params = {
        page: 1,
        limit: 1,
        sort: 'id',
      }

      this.$http({
        url: "menu/list",
        method: "get",
        params: params
      }).then(({
        data
      }) => {
        if (data && data.code === 0) {
          this.menus = JSON.parse(data.data.list[0].menujson);
          for (let i = 0; i < this.menus.length; i++) {
            if (this.menus[i].hasBackLogin=='是') {
              this.roles.push(this.menus[i])
            }
          }
          this.$storage.set("menus", this.menus);
        }
      })
    },

    //注册
    register(tableName){
		this.$storage.set("loginTable", tableName);
		this.$router.push({path:'/register',query:{pageFlag:'register'}})
    },
    // 登陆
    login() {

		if (!this.rulesForm.username) {
			this.$message.error("请输入用户名");
			return;
		}
		if (!this.rulesForm.password) {
			this.$message.error("请输入密码");
			return;
		}
		if(this.roles.length>1) {
			if (!this.rulesForm.role) {
				this.$message.error("请选择角色");
				return;
			}

			let menus = this.menus;
			for (let i = 0; i < menus.length; i++) {
				if (menus[i].roleName == this.rulesForm.role) {
					this.tableName = menus[i].tableName;
				}
			}
		} else {
			this.tableName = this.roles[0].tableName;
			this.rulesForm.role = this.roles[0].roleName;
		}
		
		this.loginPost()
    },
	loginPost() {
		this.$http({
			url: `${this.tableName}/login?username=${this.rulesForm.username}&password=${this.rulesForm.password}`,
			method: "post"
		}).then(({ data }) => {
			if (data && data.code === 0) {
				this.$storage.set("Token", data.token);
				this.$storage.set("role", this.rulesForm.role);
				this.$storage.set("sessionTable", this.tableName);
				this.$storage.set("adminName", this.rulesForm.username);
				this.$router.replace({ path: "/" });
			} else {
				this.$message.error(data.msg);
			}
		});
	},
  }
}
</script>

<style lang="scss" scoped>
.container {
  min-height: 100vh;
  position: relative;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
      background: url(http://codegen.caihongy.cn/20231102/3703718595294b8ab9b3afeea844de31.jpg);
        
  .list-item /deep/ .el-input .el-input__inner {
		border: 0px solid #eee;
		border-radius: 30px;
		padding: 0 10px;
		box-shadow: 0 0 0px rgba(64, 158, 255, .3);
		outline: 0px solid #eee;
		color: #666;
		background: #f3f3f3;
		width: 360px;
		font-size: inherit;
		outline-offset: 0px;
		height: 40px;
	  }
  
  .list-item.select /deep/ .el-select .el-input__inner {
		border: 1px solid #eee;
		border-radius: 30px;
		padding: 0 10px;
		color: #666;
		width: 360px;
		font-size: 14px;
		height: 40px;
	  }
  
  .list-code /deep/ .el-input .el-input__inner {
  	  	border: 0px solid #eee;
  	  	border-radius: 30px 0 0 30px;
  	  	padding: 0 10px;
  	  	outline: none;
  	  	color: #666;
  	  	background: #f3f3f3;
  	  	width: 260px;
  	  	font-size: inherit;
  	  	height: 40px;
  	  }

  .list-type /deep/ .el-radio__input .el-radio__inner {
		border-radius: 0;
		background: rgba(53, 53, 53, 0);
		border-color: #666666;
	  }
  .list-type /deep/ .el-radio__input.is-checked .el-radio__inner {
        border-radius: 0;
        background: #589cf6;
        border-color: #589cf6;
      }
  .list-type /deep/ .el-radio__label {
		color: #666666;
		font-size: 16px;
	  }
  .list-type /deep/ .el-radio__input.is-checked+.el-radio__label {
        color: #589cf6;
        font-size: 16px;
      }
}

</style>
