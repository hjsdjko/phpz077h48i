<template>
	<div>

	<div class="container" :style='{"minHeight":"100vh","alignItems":"center","background":"url(http://codegen.caihongy.cn/20231114/b02cac02c33549cda223ecdd28fe233a.png) fixed","display":"flex","width":"100%","backgroundSize":"cover","backgroundPosition":"center center","backgroundRepeat":"no-repeat","justifyContent":"flex-end"}'>
		<el-form class='rgs-form' v-if="pageFlag=='register'" :style='{"padding":"20px 80px","boxShadow":"0px 0 2px #DFDFDF","margin":"110px 10% 110px 0","borderRadius":"10px","flexWrap":"wrap","background":"rgba(255,255,255,.8)","display":"flex","width":"650px","position":"relative","justifyContent":"flex-end","height":"auto"}' ref="registerForm" :model="registerForm" :rules="rules">
			<div v-if="false" :style='{"margin":"0 0 10px 0","color":"rgba(64, 158, 255, 1)","textAlign":"center","width":"100%","lineHeight":"44px","fontSize":"20px","textShadow":"4px 4px 2px rgba(64, 158, 255, .5)"}'>USER / REGISTER</div>
			<div v-if="true" :style='{"margin":"0 0 10px 0","color":"#654B3C","textAlign":"center","width":"100%","lineHeight":"44px","fontSize":"24px","fontWeight":"600"}'>助农生鲜销售系统的设计与实现注册</p></div>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='yonghu'" prop="yonghuzhanghao">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('yonghuzhanghao')?'required':''">用户账号：</div>
				<el-input v-model="registerForm.yonghuzhanghao"  placeholder="请输入用户账号" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='yonghu'" prop="mima">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('mima')?'required':''">密码：</div>
				<el-input v-model="registerForm.mima" type="password" placeholder="请输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='yonghu'" prop="mima2">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('mima')?'required':''">确认密码：</div>
				<el-input v-model="registerForm.mima2" type="password" placeholder="请再次输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='yonghu'" prop="yonghuxingming">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('yonghuxingming')?'required':''">用户姓名：</div>
				<el-input v-model="registerForm.yonghuxingming"  placeholder="请输入用户姓名" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='yonghu'" prop="touxiang">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('touxiang')?'required':''">头像：</div>
                <file-upload
					tip="点击上传头像"
					action="file/upload"
					:limit="1"
					:multiple="true"
					:fileUrls="registerForm.touxiang?registerForm.touxiang:''"
					@change="yonghutouxiangUploadChange"
				></file-upload>
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='yonghu'" prop="shoujihao">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('shoujihao')?'required':''">手机号：</div>
				<el-input v-model="registerForm.shoujihao"  placeholder="请输入手机号" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='yonghu'" prop="xingbie">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('xingbie')?'required':''">性别：</div>
                <el-select v-model="registerForm.xingbie" placeholder="请选择性别" >
                  <el-option
                      v-for="(item,index) in yonghuxingbieOptions"
                      :key="index"
                      :label="item"
                      :value="item">
                  </el-option>
                </el-select>
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="shangjiazhanghao">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('shangjiazhanghao')?'required':''">商家账号：</div>
				<el-input v-model="registerForm.shangjiazhanghao"  placeholder="请输入商家账号" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="mima">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('mima')?'required':''">密码：</div>
				<el-input v-model="registerForm.mima" type="password" placeholder="请输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="mima2">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('mima')?'required':''">确认密码：</div>
				<el-input v-model="registerForm.mima2" type="password" placeholder="请再次输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="dianpumingcheng">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('dianpumingcheng')?'required':''">店铺名称：</div>
				<el-input v-model="registerForm.dianpumingcheng"  placeholder="请输入店铺名称" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="dianpudizhi">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('dianpudizhi')?'required':''">店铺地址：</div>
				<el-input v-model="registerForm.dianpudizhi"  placeholder="请输入店铺地址" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="shoujihao">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('shoujihao')?'required':''">手机号：</div>
				<el-input v-model="registerForm.shoujihao"  placeholder="请输入手机号" />
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="xingbie">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('xingbie')?'required':''">性别：</div>
                <el-select v-model="registerForm.xingbie" placeholder="请选择性别" >
                  <el-option
                      v-for="(item,index) in shangjiaxingbieOptions"
                      :key="index"
                      :label="item"
                      :value="item">
                  </el-option>
                </el-select>
			</el-form-item>
			<el-form-item :style='{"width":"100%","padding":"0","margin":"0 auto 15px","height":"auto"}' v-if="tableName=='shangjia'" prop="yingyezhizhao">
				<div v-if="true" :style='{"width":"110px","margin":"0 6px 0 0","lineHeight":"44px","fontSize":"14px","color":"#654b3c","textAlign":"right"}' :class="changeRules('yingyezhizhao')?'required':''">营业执照：</div>
                <file-upload
					tip="点击上传营业执照"
					action="file/upload"
					:limit="1"
					:multiple="true"
					:fileUrls="registerForm.yingyezhizhao?registerForm.yingyezhizhao:''"
					@change="shangjiayingyezhizhaoUploadChange"
				></file-upload>
			</el-form-item>
			<el-button :style='{"border":"0","cursor":"pointer","padding":"0 20px","margin":"0","color":"#fff","display":"inline-block","minWidth":"110px","borderRadius":"20px","background":"#654b3c","width":"auto","fontSize":"22px","fontWeight":"600","height":"44px","order":"2"}' type="primary" @click="submitForm('registerForm')">注册</el-button>
			<el-button :style='{"border":"0","cursor":"pointer","padding":"0 10px","boxShadow":"0 0 6px rgba(64, 158, 255, .5)","margin":"20px auto 5px","color":"#fff","display":"none","outline":"none","borderRadius":"8px","background":"rgba(64, 158, 255, 1)","width":"80%","fontSize":"16px","height":"44px"}' @click="resetForm('registerForm')">重置</el-button>
			<router-link :style='{"cursor":"pointer","border":"1px solid #eaeaea","padding":"0 20px","margin":"0 20px 0 0","color":"rgba(159, 159, 159, 1)","textAlign":"center","display":"inline-block","textDecoration":"none","borderRadius":"30px","width":"calc(100% - 240px)","fontSize":"14px","lineHeight":"44px","height":"44px"}' to="/login">已有账户登录</router-link>
			<div class="idea1" :style='{"width":"100%","background":"red","display":"none","height":"40px"}'></div>
			<div class="idea2" :style='{"width":"100%","background":"blue","display":"none","height":"40px"}'></div>
		</el-form>
    </div>
  </div>
</div>
</template>

<script>

export default {
    //数据集合
    data() {
		return {
            pageFlag : '',
			tableName: '',
			registerForm: {},
			forgetForm: {},
			rules: {},
			requiredRules: {},
            yonghuxingbieOptions: [],
            shangjiaxingbieOptions: [],
		}
    },
	mounted() {
		if(this.$route.query.pageFlag=='register'){
			this.tableName = this.$route.query.role;
			if(this.tableName=='yonghu'){
				this.registerForm = {
					yonghuzhanghao: '',
					mima: '',
					mima2: '',
					yonghuxingming: '',
					touxiang: '',
					shoujihao: '',
					xingbie: '',
					money: '',
					status: '',
					passwordwrongnum: '',
				}
			}
			if(this.tableName=='shangjia'){
				this.registerForm = {
					shangjiazhanghao: '',
					mima: '',
					mima2: '',
					dianpumingcheng: '',
					dianpudizhi: '',
					shoujihao: '',
					xingbie: '',
					yingyezhizhao: '',
					sfsh: '',
					shhf: '',
					money: '',
					status: '',
					passwordwrongnum: '',
				}
			}
			if ('yonghu' == this.tableName) {
				this.requiredRules.yonghuzhanghao = [{ required: true, message: '请输入用户账号', trigger: 'blur' }]
			}
			if ('yonghu' == this.tableName) {
				this.requiredRules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
			}
			if ('yonghu' == this.tableName) {
				this.requiredRules.yonghuxingming = [{ required: true, message: '请输入用户姓名', trigger: 'blur' }]
			}
			if ('shangjia' == this.tableName) {
				this.requiredRules.shangjiazhanghao = [{ required: true, message: '请输入商家账号', trigger: 'blur' }]
			}
			if ('shangjia' == this.tableName) {
				this.requiredRules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
			}
			if ('shangjia' == this.tableName) {
				this.requiredRules.dianpumingcheng = [{ required: true, message: '请输入店铺名称', trigger: 'blur' }]
			}
		}
	},
    created() {
		this.pageFlag = this.$route.query.pageFlag;
		if(this.$route.query.pageFlag=='register'){
		  if ('yonghu' == this.tableName) {
			this.rules.yonghuzhanghao = [{ required: true, message: '请输入用户账号', trigger: 'blur' }];
		  }
		  if ('yonghu' == this.tableName) {
			this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }];
		  }
		  if ('yonghu' == this.tableName) {
			this.rules.yonghuxingming = [{ required: true, message: '请输入用户姓名', trigger: 'blur' }];
		  }
		  if ('yonghu' == this.tableName) {
			this.rules.shoujihao = [{ required: true, validator: this.$validate.isMobile, trigger: 'blur' }];
		  }
			this.yonghuxingbieOptions = "男,女".split(',');
		  if ('yonghu' == this.tableName) {
			this.rules.money = [{ required: true, validator: this.$validate.isNumber, trigger: 'blur' }];
		  }
		  if ('yonghu' == this.tableName) {
			this.rules.status = [{ required: true, validator: this.$validate.isIntNumer, trigger: 'blur' }];
		  }
		  if ('yonghu' == this.tableName) {
			this.rules.passwordwrongnum = [{ required: true, validator: this.$validate.isIntNumer, trigger: 'blur' }];
		  }
		  if ('shangjia' == this.tableName) {
			this.rules.shangjiazhanghao = [{ required: true, message: '请输入商家账号', trigger: 'blur' }];
		  }
		  if ('shangjia' == this.tableName) {
			this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }];
		  }
		  if ('shangjia' == this.tableName) {
			this.rules.dianpumingcheng = [{ required: true, message: '请输入店铺名称', trigger: 'blur' }];
		  }
		  if ('shangjia' == this.tableName) {
			this.rules.shoujihao = [{ required: true, validator: this.$validate.isMobile, trigger: 'blur' }];
		  }
			this.shangjiaxingbieOptions = "男,女".split(',');
		  if ('shangjia' == this.tableName) {
			this.rules.money = [{ required: true, validator: this.$validate.isNumber, trigger: 'blur' }];
		  }
		  if ('shangjia' == this.tableName) {
			this.rules.status = [{ required: true, validator: this.$validate.isIntNumer, trigger: 'blur' }];
		  }
		  if ('shangjia' == this.tableName) {
			this.rules.passwordwrongnum = [{ required: true, validator: this.$validate.isIntNumer, trigger: 'blur' }];
		  }
		}
    },
    //方法集合
    methods: {
		changeRules(name){
			if(this.requiredRules[name]){
				return true
			}
			return false
		},
      // 获取uuid
      getUUID () {
        return new Date().getTime();
      },
        // 下二随
      yonghutouxiangUploadChange(fileUrls) {
          this.registerForm.touxiang = fileUrls.replace(new RegExp(this.$config.baseUrl,"g"),"");
      },
      shangjiayingyezhizhaoUploadChange(fileUrls) {
          this.registerForm.yingyezhizhao = fileUrls.replace(new RegExp(this.$config.baseUrl,"g"),"");
      },

        // 多级联动参数


      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            var url=this.tableName+"/register";
				if((!this.registerForm.yonghuzhanghao) && `yonghu` == this.tableName){
					this.$message.error(`用户账号不能为空`);
					return
				}
               if(`yonghu` == this.tableName && this.registerForm.mima!=this.registerForm.mima2) {
                this.$message.error(`两次密码输入不一致`);
                return
               }
				if((!this.registerForm.mima) && `yonghu` == this.tableName){
					this.$message.error(`密码不能为空`);
					return
				}
				if((!this.registerForm.yonghuxingming) && `yonghu` == this.tableName){
					this.$message.error(`用户姓名不能为空`);
					return
				}
					if(`yonghu` == this.tableName && this.registerForm.shoujihao &&(!this.$validate.isMobile2(this.registerForm.shoujihao))){
						this.$message.error(`手机号应输入手机格式`);
						return
					}
			  if(this.tableName=='shangjia'){
				  this.registerForm.sfsh = '待审核'
			  }
				if((!this.registerForm.shangjiazhanghao) && `shangjia` == this.tableName){
					this.$message.error(`商家账号不能为空`);
					return
				}
               if(`shangjia` == this.tableName && this.registerForm.mima!=this.registerForm.mima2) {
                this.$message.error(`两次密码输入不一致`);
                return
               }
				if((!this.registerForm.mima) && `shangjia` == this.tableName){
					this.$message.error(`密码不能为空`);
					return
				}
				if((!this.registerForm.dianpumingcheng) && `shangjia` == this.tableName){
					this.$message.error(`店铺名称不能为空`);
					return
				}
					if(`shangjia` == this.tableName && this.registerForm.shoujihao &&(!this.$validate.isMobile2(this.registerForm.shoujihao))){
						this.$message.error(`手机号应输入手机格式`);
						return
					}
            this.$http.post(url, this.registerForm).then(res => {
              if (res.data.code === 0) {
                this.$message({
                  message: '注册成功',
                  type: 'success',
                  duration: 1500,
                  onClose: () => {
                    this.$router.push('/login');
                  }
                });
              } else {
                this.$message.error(res.data.msg);
              }
            });
          } else {
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      }
    }
  }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
	.container {
		position: relative;
		background: url(http://codegen.caihongy.cn/20231114/b02cac02c33549cda223ecdd28fe233a.png) fixed;
		
		.el-input {
		  width: auto;
		}
		
		.el-date-editor.el-input {
			width: auto;
		}
		
		.el-form-item /deep/ .el-form-item__content {
						display: flex;
					}
		
		.rgs-form .el-input /deep/ .el-input__inner {
						border: 0;
						border-radius: 30px;
						padding: 0 10px;
						outline: none;
						color: #000;
						background: #F3F3F3;
						width: 288px;
						font-size: 14px;
						height: 44px;
					}
		
		.rgs-form .el-select /deep/ .el-input__inner {
						border: 0;
						border-radius: 30px;
						padding: 0 10px;
						outline: none;
						color: #000;
						background: #F3F3F3;
						width: 288px;
						font-size: 14px;
						height: 44px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border: 0;
						border-radius: 30px;
						padding: 0 10px 0 30px;
						outline: none;
						color: #000;
						background: #F3F3F3;
						width: 288px;
						font-size: 14px;
						height: 44px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border: 0;
						border-radius: 30px;
						padding: 0 10px 0 30px;
						outline: none;
						color: #000;
						background: #F3F3F3;
						width: 288px;
						font-size: 14px;
						height: 44px;
					}
		
		.rgs-form /deep/ .el-upload--picture-card {
			background: transparent;
			border: 0;
			border-radius: 0;
			width: auto;
			height: auto;
			line-height: initial;
			vertical-align: middle;
		}
		
		.rgs-form /deep/ .upload .upload-img {
		  		  cursor: pointer;
		  		  border-radius: 60px;
		  		  color: #666;
		  		  background: #F3F3F3;
		  		  width: 150px;
		  		  font-size: 32px;
		  		  line-height: 60px;
		  		  text-align: center;
		  		  height: 60px;
		  		}
		
		.rgs-form /deep/ .el-upload-list .el-upload-list__item {
		  		  cursor: pointer;
		  		  border-radius: 60px;
		  		  color: #666;
		  		  background: #F3F3F3;
		  		  width: 150px;
		  		  font-size: 32px;
		  		  line-height: 60px;
		  		  text-align: center;
		  		  height: 60px;
		  		}
		
		.rgs-form /deep/ .el-upload .el-icon-plus {
		  		  cursor: pointer;
		  		  border-radius: 60px;
		  		  color: #666;
		  		  background: #F3F3F3;
		  		  width: 150px;
		  		  font-size: 32px;
		  		  line-height: 60px;
		  		  text-align: center;
		  		  height: 60px;
		  		}
	}
	.required {
		position: relative;
	}
	.required::after{
				color: red;
				left: 106px;
				position: absolute;
				content: "*";
			}
</style>
