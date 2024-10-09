<template>
	<div>
		<div class="container" :style='{"minHeight":"100vh","alignItems":"center","background":"url(http://codegen.caihongy.cn/20231102/3703718595294b8ab9b3afeea844de31.jpg)","display":"flex","width":"100%","backgroundSize":"100% 100%","backgroundPosition":"center center","backgroundRepeat":"no-repeat","justifyContent":"flex-start"}'>
			<el-form v-if="pageFlag=='register'" :style='{"border":"0px solid #f6f6f6","padding":"20px 5vw 100px","margin":"50px 0 50px 8vw","borderRadius":"8px","textAlign":"center","flexWrap":"wrap","background":"rgba(0,0,0,.5)","display":"flex","width":"35vw","fontSize":"14px","position":"relative","height":"auto"}' ref="rgsForm" class="rgs-form" :model="rgsForm" :rules="rules">
				<div v-if="true" :style='{"padding":"0 0 0 100px","margin":"20px auto 30px","borderColor":"#eee","color":"#fff","textAlign":"left","display":"inline-block","background":"url(http://codegen.caihongy.cn/20231102/8510e68829374383b97a281acf720a23.png) no-repeat left center /  80px","borderWidth":"0px","width":"100%","lineHeight":"40px","fontSize":"20px","borderStyle":"solid","fontWeight":"500"}' class="title">助农生鲜销售系统的设计与实现注册</div>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('yonghuzhanghao')?'required':''">用户账号：</div>
					<el-input  v-model="ruleForm.yonghuzhanghao"  autocomplete="off" placeholder="用户账号"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('mima')?'required':''">密码：</div>
					<el-input  v-model="ruleForm.mima"  autocomplete="off" placeholder="密码"  type="password"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('mima')?'required':''">确认密码：</div>
					<el-input  v-model="ruleForm.mima2" autocomplete="off" placeholder="确认密码" type="password" />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('yonghuxingming')?'required':''">用户姓名：</div>
					<el-input  v-model="ruleForm.yonghuxingming"  autocomplete="off" placeholder="用户姓名"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('touxiang')?'required':''">头像：</div>
                    <file-upload
                        tip="点击上传头像"
                        action="file/upload"
                        :limit="3"
                        :multiple="true"
                        :fileUrls="ruleForm.touxiang?ruleForm.touxiang:''"
                        @change="yonghutouxiangUploadChange"
                    ></file-upload>
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('shoujihao')?'required':''">手机号：</div>
					<el-input  v-model="ruleForm.shoujihao"  autocomplete="off" placeholder="手机号"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('xingbie')?'required':''">性别：</div>
                    <el-select v-model="ruleForm.xingbie" placeholder="请选择性别" >
                        <el-option
                            v-for="(item,index) in yonghuxingbieOptions"
                            v-bind:key="index"
                            :label="item"
                            :value="item">
                        </el-option>
                    </el-select>
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('shangjiazhanghao')?'required':''">商家账号：</div>
					<el-input  v-model="ruleForm.shangjiazhanghao"  autocomplete="off" placeholder="商家账号"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('mima')?'required':''">密码：</div>
					<el-input  v-model="ruleForm.mima"  autocomplete="off" placeholder="密码"  type="password"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('mima')?'required':''">确认密码：</div>
					<el-input  v-model="ruleForm.mima2" autocomplete="off" placeholder="确认密码" type="password" />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('dianpumingcheng')?'required':''">店铺名称：</div>
					<el-input  v-model="ruleForm.dianpumingcheng"  autocomplete="off" placeholder="店铺名称"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('dianpudizhi')?'required':''">店铺地址：</div>
					<el-input  v-model="ruleForm.dianpudizhi"  autocomplete="off" placeholder="店铺地址"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('shoujihao')?'required':''">手机号：</div>
					<el-input  v-model="ruleForm.shoujihao"  autocomplete="off" placeholder="手机号"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('xingbie')?'required':''">性别：</div>
                    <el-select v-model="ruleForm.xingbie" placeholder="请选择性别" >
                        <el-option
                            v-for="(item,index) in shangjiaxingbieOptions"
                            v-bind:key="index"
                            :label="item"
                            :value="item">
                        </el-option>
                    </el-select>
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 15px","textAlign":"left","flexWrap":"wrap","display":"block","width":"100%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='shangjia'">
					<div v-if="false" :style='{"padding":"0 10px","color":"#666","textAlign":"left","display":"inline-block","width":"100%","lineHeight":"40px","fontSize":"14px","order":"2"}' class="lable" :class="changeRules('yingyezhizhao')?'required':''">营业执照：</div>
                    <file-upload
                        tip="点击上传营业执照"
                        action="file/upload"
                        :limit="3"
                        :multiple="true"
                        :fileUrls="ruleForm.yingyezhizhao?ruleForm.yingyezhizhao:''"
                        @change="shangjiayingyezhizhaoUploadChange"
                    ></file-upload>
				</el-form-item>
				<button :style='{"border":"0","cursor":"pointer","padding":"0px","boxShadow":"0 0 0px rgba(64, 158, 255, .5)","margin":"20px auto 5px","color":"#fff","borderRadius":"30px","background":"#7c3ef3","display":"inline-block","width":"140px","fontSize":"16px","height":"40px"}' type="button" class="r-btn" @click="login()">注册</button>
				<div :style='{"cursor":"pointer","padding":"0 20px","margin":"20px 0 0","color":"#eee","textAlign":"right","display":"inline-block","width":"auto","lineHeight":"40px","fontSize":"13px"}' class="r-login" @click="close()">已有账号，直接登录</div>
			</el-form>
			
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			ruleForm: {
			},
			forgetForm: {},
            pageFlag : '',
			tableName:"",
			rules: {},
            yonghuxingbieOptions: [],
            shangjiaxingbieOptions: [],
		};
	},
	mounted(){
		this.pageFlag = this.$route.query.pageFlag
		if(this.$route.query.pageFlag=='register'){
			
			let table = this.$storage.get("loginTable");
			this.tableName = table;
			if(this.tableName=='yonghu'){
				this.ruleForm = {
					yonghuzhanghao: '',
					mima: '',
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
				this.ruleForm = {
					shangjiazhanghao: '',
					mima: '',
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
				this.rules.yonghuzhanghao = [{ required: true, message: '请输入用户账号', trigger: 'blur' }]
			}
			if ('yonghu' == this.tableName) {
				this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
			}
			if ('yonghu' == this.tableName) {
				this.rules.yonghuxingming = [{ required: true, message: '请输入用户姓名', trigger: 'blur' }]
			}
			if ('shangjia' == this.tableName) {
				this.rules.shangjiazhanghao = [{ required: true, message: '请输入商家账号', trigger: 'blur' }]
			}
			if ('shangjia' == this.tableName) {
				this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
			}
			if ('shangjia' == this.tableName) {
				this.rules.dianpumingcheng = [{ required: true, message: '请输入店铺名称', trigger: 'blur' }]
			}
			this.yonghuxingbieOptions = "男,女".split(',')
			this.shangjiaxingbieOptions = "男,女".split(',')
		}
	},
	created() {
	},
	destroyed() {
		  	},
	methods: {
		changeRules(name){
			if(this.rules[name]){
				return true
			}
			return false
		},
		// 获取uuid
		getUUID () {
			return new Date().getTime();
		},
		close(){
			this.$router.push({ path: "/login" });
		},
        yonghutouxiangUploadChange(fileUrls) {
            this.ruleForm.touxiang = fileUrls;
        },
        shangjiayingyezhizhaoUploadChange(fileUrls) {
            this.ruleForm.yingyezhizhao = fileUrls;
        },

        // 多级联动参数


		// 注册
		login() {
			var url=this.tableName+"/register";
					if((!this.ruleForm.yonghuzhanghao) && `yonghu` == this.tableName){
						this.$message.error(`用户账号不能为空`);
						return
					}
					if((!this.ruleForm.mima) && `yonghu` == this.tableName){
						this.$message.error(`密码不能为空`);
						return
					}
					if((this.ruleForm.mima!=this.ruleForm.mima2) && `yonghu` == this.tableName){
						this.$message.error(`两次密码输入不一致`);
						return
					}
					if((!this.ruleForm.yonghuxingming) && `yonghu` == this.tableName){
						this.$message.error(`用户姓名不能为空`);
						return
					}
            if(this.ruleForm.touxiang!=null) {
                this.ruleForm.touxiang = this.ruleForm.touxiang.replace(new RegExp(this.$base.url,"g"),"");
            }
					if(`yonghu` == this.tableName && this.ruleForm.shoujihao &&(!this.$validate.isMobile(this.ruleForm.shoujihao))){
						this.$message.error(`手机号应输入手机格式`);
						return
					}
			  if(this.tableName=='shangjia'){
				  this.ruleForm.sfsh = '待审核'
			  }
					if((!this.ruleForm.shangjiazhanghao) && `shangjia` == this.tableName){
						this.$message.error(`商家账号不能为空`);
						return
					}
					if((!this.ruleForm.mima) && `shangjia` == this.tableName){
						this.$message.error(`密码不能为空`);
						return
					}
					if((this.ruleForm.mima!=this.ruleForm.mima2) && `shangjia` == this.tableName){
						this.$message.error(`两次密码输入不一致`);
						return
					}
					if((!this.ruleForm.dianpumingcheng) && `shangjia` == this.tableName){
						this.$message.error(`店铺名称不能为空`);
						return
					}
					if(`shangjia` == this.tableName && this.ruleForm.shoujihao &&(!this.$validate.isMobile(this.ruleForm.shoujihao))){
						this.$message.error(`手机号应输入手机格式`);
						return
					}
            if(this.ruleForm.yingyezhizhao!=null) {
                this.ruleForm.yingyezhizhao = this.ruleForm.yingyezhizhao.replace(new RegExp(this.$base.url,"g"),"");
            }
			this.$http({
				url: url,
				method: "post",
				data:this.ruleForm
			}).then(({ data }) => {
				if (data && data.code === 0) {
					this.$message({
						message: "注册成功",
						type: "success",
						duration: 1500,
						onClose: () => {
							this.$router.replace({ path: "/login" });
						}
					});
				} else {
					this.$message.error(data.msg);
				}
			});
		}
	}
};
</script>

<style lang="scss" scoped>
	.container {
	  position: relative;
	  background: url(http://codegen.caihongy.cn/20231102/3703718595294b8ab9b3afeea844de31.jpg);

		.el-date-editor.el-input {
		  width: 100%;
		}
		
		.rgs-form .el-input /deep/ .el-input__inner {
						border: 0px solid #eee;
						border-radius: 30px;
						padding: 0 10px;
						box-shadow: 0 0 0px rgba(64, 158, 255, .3);
						outline: none;
						color: #666;
						background: #f3f3f3;
						width: 360px;
						font-size: 14px;
						height: 40px;
					}
		
		.rgs-form .el-select /deep/ .el-input__inner {
						border: 0px solid #eee;
						border-radius: 30px;
						padding: 0 10px;
						box-shadow: 0 0 0px rgba(64, 158, 255, .3);
						outline: none;
						color: #666;
						background: #f3f3f3;
						width: 360px;
						font-size: 14px;
						height: 40px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border: 0px solid #eee;
						border-radius: 30px;
						padding: 0 10px 0 30px;
						box-shadow: 0 0 0px rgba(64, 158, 255, .3);
						outline: none;
						color: #666;
						background: #f3f3f3;
						width: 360px;
						font-size: 14px;
						height: 40px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border: 0px solid #eee;
						border-radius: 30px;
						padding: 0 10px 0 30px;
						box-shadow: 0 0 0px rgba(64, 158, 255, .3);
						outline: none;
						color: #666;
						background: #f3f3f3;
						width: 360px;
						font-size: 14px;
						height: 40px;
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
		  		  border: 0px solid #eee;
		  		  cursor: pointer;
		  		  border-radius: 30px;
		  		  color: #666;
		  		  background: #f3f3f3;
		  		  font-weight: 600;
		  		  width: 120px;
		  		  font-size: 24px;
		  		  line-height: 60px;
		  		  text-align: center;
		  		  height: 60px;
		  		}
		
		.rgs-form /deep/ .el-upload-list .el-upload-list__item {
		  		  border: 0px solid #eee;
		  		  cursor: pointer;
		  		  border-radius: 30px;
		  		  color: #666;
		  		  background: #f3f3f3;
		  		  font-weight: 600;
		  		  width: 120px;
		  		  font-size: 24px;
		  		  line-height: 60px;
		  		  text-align: center;
		  		  height: 60px;
		  		}
		
		.rgs-form /deep/ .el-upload .el-icon-plus {
		  		  border: 0px solid #eee;
		  		  cursor: pointer;
		  		  border-radius: 30px;
		  		  color: #666;
		  		  background: #f3f3f3;
		  		  font-weight: 600;
		  		  width: 120px;
		  		  font-size: 24px;
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
				left: 0;
				position: absolute;
				content: "*";
				order: 1;
			}
	.editor>.avatar-uploader {
		line-height: 0;
		height: 0;
	}
</style>
