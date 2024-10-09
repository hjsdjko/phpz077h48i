<template>
	<div class="main-containers">
		<div class="body-containers" :style='{"minHeight":"100vh","padding":"45px 0 0","margin":"0","position":"relative","background":"#ffffff"}'>
		<div class="top-container" :style='{"padding":"0 20px","top":"0","alignItems":"center","left":"0","background":"#f0f0f0","display":"flex","width":"100%","position":"fixed","justifyContent":"flex-end","height":"45px","zIndex":"1002"}'>
			<!-- info -->
			<div :style='{"padding":"0 0 0 40px","alignItems":"center","left":"0","bottom":"-120px","background":"none","display":"flex","width":"21%","position":"absolute","height":"120px"}'>
			  <span @click="goMenu('/index/home')" :style='{"padding":"0 0 0 12px","lineHeight":"1.5","fontSize":"22px","color":"#654b3c","float":"left"}'>助农生鲜销售系统的设计与实现</span>
			</div>
			
			<div v-if="false" :style='{"color":"#666","margin":"0 10px","fontSize":"14px"}'>0753-1234567</div>
			<el-button v-if="Token" class="btn-shop" @click.native="goMenu('/index/cart')">
				<span class="icon iconfont icon-wuliu8" :style='{"color":"inherit","fontSize":"14px"}'></span>
				购物车
			</el-button>
			
			<img v-if="headportrait&&Token" :style='{"width":"40px","margin":"0 12px","borderRadius":"50%","display":"none","height":"40px"}' :src="headportrait?baseUrl + headportrait:require('@/assets/avator.png')">
			<div v-if="Token" :style='{"padding":"0 12px","margin":"0 10px 0 0","fontSize":"14px","lineHeight":"32px","color":"#654B3C","height":"32px"}'>{{username}}</div>
			<div v-if="Token && notAdmin" :style='{"cursor":"pointer","padding":"0 12px 0 20px","color":"#654B3C","background":"url(http://codegen.caihongy.cn/20240219/8f7c7f4001bc41469d7d3d004e532cf6.png) no-repeat left center / 20px","fontSize":"14px","lineHeight":"32px","height":"32px"}' @click="goMenu('/index/center')">个人中心</div>
			<el-button v-if="!Token" @click="toLogin()" :style='{"border":"0","padding":"0 12px","margin":"0 10px","color":"#fff","borderRadius":"2px","background":"#654B3C","display":"inline-block","fontSize":"14px","lineHeight":"32px","height":"32px"}'>登录/注册</el-button>
			<el-button v-if="Token" @click="logout" :style='{"border":"0","padding":"0 12px","margin":"0 10px","color":"#fff","borderRadius":"2px","background":"#c00","display":"inline-block","fontSize":"14px","lineHeight":"32px","height":"32px"}'>退出</el-button>
		</div>


			<div class="menu-preview" :style='{"padding":"0 21% 0 21%","borderColor":"#efefef","top":"45px","background":"#ffffff","borderWidth":"0","width":"100%","position":"fixed","borderStyle":"solid","height":"auto","zIndex":"999"}'>
			<el-scrollbar wrap-class="scrollbar-wrapper-horizontal">
				<el-menu class="el-menu-horizontal-demo" :style='{"border":0,"padding":"0","listStyle":"none","margin":"0","alignItems":"center","background":"#FFF","display":"flex","width":"100%","position":"relative","justifyContent":"center","height":"120px"}' :default-active="activeMenu" :unique-opened="true" mode="horizontal" :router="true" @select="handleSelect">
					<div class="userinfo" :style='{"width":"84px","padding":"6px 10px 0","display":"none","height":"auto"}'>
					  <el-image v-if="headportrait&&Token" :style='{"width":"100%","objectFit":"cover","borderRadius":"20px","display":"block","height":"32px"}' :src="headportrait?baseUrl + headportrait:require('@/assets/avator.png')" fit="cover"></el-image>
					  <div :style='{"fontSize":"12px","lineHeight":"1.5","color":"#333","textAlign":"center"}'>{{username}}</div>
					</div>
					<el-menu-item class="home" index="/index/home" @click.native="goMenu('/index/home')">
						<span :style='{"padding":"0 10px","margin":"0","color":"inherit","width":"18px","lineHeight":"56px","fontSize":"18px","height":"56px"}' class="icon iconfont icon-shouye-zhihui"></span>
						<span :style='{"padding":"0 10px","lineHeight":"56px","fontSize":"18px","color":"inherit","height":"56px"}'>首页</span>
					</el-menu-item>
					<el-menu-item class="item" v-for="(menu, index) in menuList" :index="menu.url" :key="index" @click.native="goMenu(menu.url)">
						<i :style='{"padding":"0 10px","margin":"0","color":"inherit","width":"18px","lineHeight":"56px","fontSize":"18px","height":"56px"}' :class="iconArr[index]"></i>
						<span :style='{"padding":"0 10px","lineHeight":"56px","fontSize":"18px","color":"inherit","height":"56px"}'>{{menu.name}}</span>
					</el-menu-item>
					<el-menu-item class="shop" v-if="Token" index="/index/cart" @click.native="goMenu('/index/cart')">
						<span :style='{"padding":"0 10px","margin":"0","color":"inherit","width":"14px","lineHeight":"56px","fontSize":"14px","height":"56px"}' class="icon iconfont icon-wuliu8"></span>
						<span :style='{"padding":"0 10px","lineHeight":"56px","fontSize":"14px","color":"inherit","height":"56px"}'>购物车</span>
					</el-menu-item>
					<el-menu-item class="user" index="/index/center" v-if="Token && notAdmin" @click.native="goMenu('/index/center')">
						<span :style='{"padding":"0 10px","margin":"0","color":"inherit","width":"14px","lineHeight":"56px","fontSize":"14px","height":"56px"}' class="icon iconfont icon-shouye-zhihui"></span>
						<span :style='{"padding":"0 10px","lineHeight":"56px","fontSize":"14px","color":"inherit","height":"56px"}'>个人中心</span>
					</el-menu-item>
				</el-menu>
			</el-scrollbar>
			</div>


			<div class="banner-preview" :style='{"width":"100%","margin":"120px 0 0 0","height":"auto"}'>
				<el-carousel :style='{"width":"100%","margin":"0 auto","height":"480px"}' trigger="click" indicator-position="inside" arrow="always" type="default" direction="horizontal" height="600px" :autoplay="true" :interval="3000" :loop="true">
					<el-carousel-item :style='{"borderRadius":"0","width":"100%","height":"480px"}' v-for="item in carouselList" :key="item.id">
						<el-image v-if="preHttp(item.value)" @click="carouselClick(item.url)" :style='{"objectFit":"cover","width":"100%","height":"100%"}' :src="item.value" fit="cover"></el-image>
						<el-image v-else @click="carouselClick(item.url)" :style='{"objectFit":"cover","width":"100%","height":"100%"}' :src="baseUrl + item.value" fit="cover"></el-image>
					</el-carousel-item>
				</el-carousel>
			</div>


			<router-view id="scrollView"></router-view>
			
			<div class="bottom-preview" :style='{"width":"100%","height":"auto"}'>
				<div :style='{"width":"100%","padding":"20px","overflow":"hidden","background":"#654B3C","height":"auto"}'><div v-html="bottomContent"></div></div>
			</div>
		</div>
		
	</div>
</template>

<script>
import Vue from 'vue'
import Swiper from "swiper";
import axios from 'axios'

export default {
    data() {
		return {
            activeIndex: '0',
			roleMenus: [{"backMenu":[{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-send","buttons":["新增","查看","修改","删除"],"menu":"用户","menuJump":"列表","tableName":"yonghu"}],"menu":"用户管理"},{"child":[{"allButtons":["新增","查看","修改","删除","审核"],"appFrontIcon":"cuIcon-send","buttons":["新增","查看","修改","删除","审核"],"menu":"商家","menuJump":"列表","tableName":"shangjia"}],"menu":"商家管理"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-time","buttons":["新增","查看","修改","删除"],"menu":"商品分类","menuJump":"列表","tableName":"shangpinfenlei"}],"menu":"商品分类管理"},{"child":[{"allButtons":["新增","查看","修改","删除","商品上架"],"appFrontIcon":"cuIcon-camera","buttons":["查看","修改","删除"],"menu":"商品库存","menuJump":"列表","tableName":"shangpinkucun"}],"menu":"商品库存管理"},{"child":[{"allButtons":["新增","查看","修改","删除","查看评论"],"appFrontIcon":"cuIcon-pic","buttons":["查看","修改","删除"],"menu":"商品信息","menuJump":"列表","tableName":"shangpinxinxi"}],"menu":"商品信息管理"},{"child":[{"allButtons":["新增","查看","修改","删除","查看评论","我要捐款"],"appFrontIcon":"cuIcon-form","buttons":["新增","查看","修改","删除","查看评论"],"menu":"爱心捐款","menuJump":"列表","tableName":"aixinjuankuan"}],"menu":"爱心捐款管理"},{"child":[{"allButtons":["新增","查看","修改","删除","支付","公示"],"appFrontIcon":"cuIcon-clothes","buttons":["查看","公示","删除"],"menu":"捐款信息","menuJump":"列表","tableName":"juankuanxinxi"}],"menu":"捐款信息管理"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-send","buttons":["新增","查看","修改","删除"],"menu":"捐款公示","menuJump":"列表","tableName":"juankuangongshi"}],"menu":"捐款公示管理"},{"child":[{"allButtons":["新增","查看","修改","删除","售后处理"],"appFrontIcon":"cuIcon-keyboard","buttons":["查看","删除"],"menu":"售后申请","menuJump":"列表","tableName":"shouhoushenqing"}],"menu":"售后申请管理"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-flashlightopen","buttons":["查看","删除"],"menu":"售后反馈","menuJump":"列表","tableName":"shouhoufankui"}],"menu":"售后反馈管理"},{"child":[{"allButtons":["查看","编辑名称","编辑父级","编辑权限","删除"],"appFrontIcon":"cuIcon-link","buttons":["查看","编辑名称","编辑父级","编辑权限","删除"],"menu":"菜单列表","tableName":"menu"},{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-pay","buttons":["新增","查看","修改","删除"],"menu":"轮播图管理","tableName":"config"},{"allButtons":["查看","修改"],"appFrontIcon":"cuIcon-addressbook","buttons":["查看","修改"],"menu":"关于我们","tableName":"aboutus"},{"allButtons":["查看","修改"],"appFrontIcon":"cuIcon-brand","buttons":["查看","修改"],"menu":"系统简介","tableName":"systemintro"}],"menu":"系统管理"},{"child":[{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","发货","物流","核销"],"appFrontIcon":"cuIcon-addressbook","buttons":["查看","日销量","品销量","日销额","品销额"],"menu":"已支付订单","tableName":"orders/已支付"},{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","物流","退货审核"],"appFrontIcon":"cuIcon-flashlightopen","buttons":["查看"],"menu":"已完成订单","tableName":"orders/已完成"},{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","物流"],"appFrontIcon":"cuIcon-similar","buttons":["查看"],"menu":"已退款订单","tableName":"orders/已退款"},{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","确认收货","物流"],"appFrontIcon":"cuIcon-full","buttons":["查看"],"menu":"已发货订单","tableName":"orders/已发货"}],"menu":"订单管理"}],"frontMenu":[{"child":[{"allButtons":["新增","查看","修改","删除","查看评论"],"appFrontIcon":"cuIcon-circle","buttons":["查看","查看评论"],"menu":"商品信息列表","menuJump":"列表","tableName":"shangpinxinxi"}],"menu":"商品信息模块"},{"child":[{"allButtons":["新增","查看","修改","删除","查看评论","我要捐款"],"appFrontIcon":"cuIcon-pic","buttons":["查看","查看评论","我要捐款"],"menu":"爱心捐款列表","menuJump":"列表","tableName":"aixinjuankuan"}],"menu":"爱心捐款模块"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-shop","buttons":["查看"],"menu":"捐款公示列表","menuJump":"列表","tableName":"juankuangongshi"}],"menu":"捐款公示模块"}],"hasBackLogin":"是","hasBackRegister":"否","hasFrontLogin":"否","hasFrontRegister":"否","roleName":"管理员","tableName":"users"},{"backMenu":[{"child":[{"allButtons":["新增","查看","修改","删除","支付","公示"],"appFrontIcon":"cuIcon-clothes","buttons":["查看","支付"],"menu":"捐款信息","menuJump":"列表","tableName":"juankuanxinxi"}],"menu":"捐款信息管理"},{"child":[{"allButtons":["新增","查看","修改","删除","售后处理"],"appFrontIcon":"cuIcon-keyboard","buttons":["新增","查看","删除","修改"],"menu":"售后申请","menuJump":"列表","tableName":"shouhoushenqing"}],"menu":"售后申请管理"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-flashlightopen","buttons":["查看"],"menu":"售后反馈","menuJump":"列表","tableName":"shouhoufankui"}],"menu":"售后反馈管理"}],"frontMenu":[{"child":[{"allButtons":["新增","查看","修改","删除","查看评论"],"appFrontIcon":"cuIcon-circle","buttons":["查看","查看评论"],"menu":"商品信息列表","menuJump":"列表","tableName":"shangpinxinxi"}],"menu":"商品信息模块"},{"child":[{"allButtons":["新增","查看","修改","删除","查看评论","我要捐款"],"appFrontIcon":"cuIcon-pic","buttons":["查看","查看评论","我要捐款"],"menu":"爱心捐款列表","menuJump":"列表","tableName":"aixinjuankuan"}],"menu":"爱心捐款模块"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-shop","buttons":["查看"],"menu":"捐款公示列表","menuJump":"列表","tableName":"juankuangongshi"}],"menu":"捐款公示模块"}],"hasBackLogin":"否","hasBackRegister":"否","hasFrontLogin":"是","hasFrontRegister":"是","roleName":"用户","tableName":"yonghu"},{"backMenu":[{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-time","buttons":["新增","查看","修改","删除"],"menu":"商品分类","menuJump":"列表","tableName":"shangpinfenlei"}],"menu":"商品分类管理"},{"child":[{"allButtons":["新增","查看","修改","删除","商品上架"],"appFrontIcon":"cuIcon-camera","buttons":["新增","查看","修改","删除","商品上架"],"menu":"商品库存","menuJump":"列表","tableName":"shangpinkucun"}],"menu":"商品库存管理"},{"child":[{"allButtons":["新增","查看","修改","删除","查看评论"],"appFrontIcon":"cuIcon-pic","buttons":["查看","修改","删除","查看评论"],"menu":"商品信息","menuJump":"列表","tableName":"shangpinxinxi"}],"menu":"商品信息管理"},{"child":[{"allButtons":["新增","查看","修改","删除","售后处理"],"appFrontIcon":"cuIcon-keyboard","buttons":["查看","售后处理"],"menu":"售后申请","menuJump":"列表","tableName":"shouhoushenqing"}],"menu":"售后申请管理"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-flashlightopen","buttons":["查看","修改","删除"],"menu":"售后反馈","menuJump":"列表","tableName":"shouhoufankui"}],"menu":"售后反馈管理"},{"child":[{"allButtons":["查看","修改"],"appFrontIcon":"cuIcon-brand","buttons":["查看"],"menu":"系统简介","tableName":"systemintro"},{"allButtons":["查看","修改"],"appFrontIcon":"cuIcon-addressbook","buttons":["查看"],"menu":"关于我们","tableName":"aboutus"}],"menu":"系统管理"},{"child":[{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","发货","物流","核销"],"appFrontIcon":"cuIcon-addressbook","buttons":["查看","发货","日销量","品销量","日销额","品销额"],"menu":"已支付订单","tableName":"orders/已支付"},{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","物流","退货审核"],"appFrontIcon":"cuIcon-flashlightopen","buttons":["查看","退货审核"],"menu":"已完成订单","tableName":"orders/已完成"},{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","物流"],"appFrontIcon":"cuIcon-similar","buttons":["查看"],"menu":"已退款订单","tableName":"orders/已退款"},{"allButtons":["新增","查看","修改","删除","导出","日销量","月销量","年销量","品销量","类销量","日销额","月销额","年销额","品销额","类销额","确认收货","物流"],"appFrontIcon":"cuIcon-full","buttons":["查看","物流"],"menu":"已发货订单","tableName":"orders/已发货"}],"menu":"订单管理"}],"frontMenu":[{"child":[{"allButtons":["新增","查看","修改","删除","查看评论"],"appFrontIcon":"cuIcon-circle","buttons":["查看","查看评论"],"menu":"商品信息列表","menuJump":"列表","tableName":"shangpinxinxi"}],"menu":"商品信息模块"},{"child":[{"allButtons":["新增","查看","修改","删除","查看评论","我要捐款"],"appFrontIcon":"cuIcon-pic","buttons":["查看","查看评论","我要捐款"],"menu":"爱心捐款列表","menuJump":"列表","tableName":"aixinjuankuan"}],"menu":"爱心捐款模块"},{"child":[{"allButtons":["新增","查看","修改","删除"],"appFrontIcon":"cuIcon-shop","buttons":["查看"],"menu":"捐款公示列表","menuJump":"列表","tableName":"juankuangongshi"}],"menu":"捐款公示模块"}],"hasBackLogin":"是","hasBackRegister":"是","hasFrontLogin":"否","hasFrontRegister":"否","roleName":"商家","tableName":"shangjia"}],
			baseUrl: '',
			carouselList: [],
			menuList: [],
			form: {
				ask: '',
				userid: localStorage.getItem('frontUserid')
			},
			headportrait: localStorage.getItem('frontHeadportrait')?localStorage.getItem('frontHeadportrait'):'',
			Token: localStorage.getItem('frontToken'),
            username: localStorage.getItem('username'),
            notAdmin: localStorage.getItem('frontSessionTable')!='"users"',
			timer: '',
			iconArr: [
				'el-icon-star-off',
				'el-icon-goods',
				'el-icon-warning',
				'el-icon-question',
				'el-icon-info',
				'el-icon-help',
				'el-icon-picture-outline-round',
				'el-icon-camera-solid',
				'el-icon-video-camera-solid',
				'el-icon-video-camera',
				'el-icon-bell',
				'el-icon-s-cooperation',
				'el-icon-s-order',
				'el-icon-s-platform',
				'el-icon-s-operation',
				'el-icon-s-promotion',
				'el-icon-s-release',
				'el-icon-s-ticket',
				'el-icon-s-management',
				'el-icon-s-open',
				'el-icon-s-shop',
				'el-icon-s-marketing',
				'el-icon-s-flag',
				'el-icon-s-comment',
				'el-icon-s-finance',
				'el-icon-s-claim',
				'el-icon-s-opportunity',
				'el-icon-s-data',
				'el-icon-s-check'
			],
			bottomContent: '',
		}
    },
    created() {
		this.baseUrl = this.$config.baseUrl;
		this.menuList = this.$config.indexNav;
		this.getCarousel();
        if(localStorage.getItem('frontToken') && localStorage.getItem('frontToken')!=null) {
			this.getSession()
        }
    },
    mounted() {
        this.activeIndex = localStorage.getItem('keyPath') || '0';



    },
    computed: {
		activeMenu() {
			const route = this.$route
			const {
				meta,
				path
			} = route
			// if st path, the sidebar will highlight the path you sete
			if (meta.activeMenu) {
				return meta.activeMenu
			}
			return path
		},
    },
    watch: {
        $route(newValue) {
            let that = this
            let url = window.location.href
            let arr = url.split('#')
            for (let x in this.menuList) {
                if (newValue.path == this.menuList[x].url) {
                    this.activeIndex = x
                }
            }
            this.Token = localStorage.getItem('frontToken')
            if(arr[1]!='/index/home'){
            	var element = document.getElementById('scrollView');
            	var distance = element.offsetTop;
            	window.scrollTo( 0, distance )
            }else{
            	window.scrollTo( 0, 0 )
            }
        },
		headportrait(){
			this.$forceUpdate()
		},
    },
    methods: {
		preHttp(str) {
			return str && str.substr(0,4)=='http';
		},

		async getSession() {
			await this.$http.get(`${localStorage.getItem('UserTableName')}/session`, {emulateJSON: true}).then(async res => {
				if (res.data.code == 0) {
					localStorage.setItem('sessionForm',JSON.stringify(res.data.data))
					localStorage.setItem('frontUserid', res.data.data.id);
					if(res.data.data.vip) {
						localStorage.setItem('vip', res.data.data.vip);
					}
					if(res.data.data.touxiang) {
						this.headportrait = res.data.data.touxiang
						localStorage.setItem('frontHeadportrait', res.data.data.touxiang);
					} else if(res.data.data.headportrait) {
						this.headportrait = res.data.data.headportrait
						localStorage.setItem('frontHeadportrait', res.data.data.headportrait);
					}
				}
			});
		},
        handleSelect(keyPath) {
            if (keyPath) {
                localStorage.setItem('keyPath', keyPath)
            }
        },
		toLogin() {
		  this.$router.push('/login');
		},
        logout() {
            localStorage.clear();
            Vue.http.headers.common['Token'] = "";
            this.$router.push('/index/home');
            this.activeIndex = '0'
            localStorage.setItem('keyPath', this.activeIndex)
            this.Token = ''
            this.$forceUpdate()
            this.$message({
                message: '登出成功',
                type: 'success',
                duration: 1000,
            });
        },
		getCarousel() {
			this.$http.get('config/list', {params: { page: 1, limit: 3 }}).then(res => {
				if (res.data.code == 0) {
					this.carouselList = res.data.data.list;
				}
			});
		},
		// 轮播图跳转
		carouselClick(url) {
			if (url) {
				if (url.indexOf('https') != -1) {
					window.open(url)
				} else {
					this.$router.push(url)
				}
			}
		},
		goBackend() {
			localStorage.setItem('Token', localStorage.getItem('frontToken'));
			localStorage.setItem('role', localStorage.getItem('frontRole'));
			localStorage.setItem('sessionTable', localStorage.getItem('frontSessionTable'));
			localStorage.setItem('headportrait', localStorage.getItem('frontHeadportrait'));
			localStorage.setItem('userid', localStorage.getItem('frontUserid'));
			window.location.href = `${this.$config.baseUrl}admin/dist/index.html`
			
		},
		goMenu(path) {
            this.$router.push(path);
		},
    }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
	.menu-preview {
	  .el-scrollbar {
	    height: 100%;
	  
	    & /deep/ .scrollbar-wrapper-vertical {
	      overflow-x: hidden;
	    }
	  
	    & /deep/ .scrollbar-wrapper-horizontal {
	      overflow-y: hidden;
	  
	      .el-scrollbar__view {
	        white-space: nowrap;
	      }
	    }
	  }
	}
	
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.home {
				cursor: pointer;
				padding: 0 0px;
				color: #654b3c;
				white-space: nowrap;
				display: flex;
				font-size: 14px;
				border-color: #f0f0f0;
				line-height: 56px;
				background: #fff;
				justify-content: center;
				border-width: 0 1px 0 0;
				align-items: center;
				position: relative;
				border-style: solid;
				list-style: none;
				min-width: 100px;
				height: 56px;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.home:hover {
				color: #fff;
				background: #654b3c;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.home.is-active {
				color: #fff;
				background: #654b3c;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.user {
				cursor: pointer;
				border: 0;
				padding: 0 20px;
				color: #333;
				white-space: nowrap;
				display: none;
				font-size: 14px;
				line-height: 56px;
				background: #fff;
				align-items: center;
				position: relative;
				list-style: none;
				height: 56px;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.user:hover {
				color: #fff;
				background: red;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.user.is-active {
				color: #fff;
				background: blue;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.service {
				cursor: pointer;
				border: 0;
				padding: 0 20px;
				color: #333;
				white-space: nowrap;
				display: none;
				font-size: 14px;
				line-height: 56px;
				background: #fff;
				align-items: center;
				position: relative;
				list-style: none;
				height: 56px;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.service:hover {
				color: #fff;
				background: red;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.service.is-active {
				color: #fff;
				background: blue;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.shop {
				cursor: pointer;
				border: 0;
				padding: 0 20px;
				color: #333;
				white-space: nowrap;
				display: none;
				font-size: 14px;
				line-height: 56px;
				background: #fff;
				align-items: center;
				position: relative;
				list-style: none;
				height: 56px;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.shop:hover {
				color: #fff;
				background: red;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.shop.is-active {
				color: #fff;
				background: blue;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.back {
				cursor: pointer;
				border: 0;
				padding: 0 20px;
				color: #333;
				white-space: nowrap;
				display: none;
				font-size: 14px;
				line-height: 56px;
				background: #fff;
				align-items: center;
				position: relative;
				list-style: none;
				height: 56px;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.back:hover {
				color: #fff;
				background: red;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.back.is-active {
				color: #fff;
				background: blue;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.item {
				cursor: pointer;
				padding: 0 0px;
				color: #654b3c;
				white-space: nowrap;
				display: flex;
				font-size: 14px;
				border-color: #f0f0f0;
				line-height: 56px;
				background: #fff;
				justify-content: center;
				border-width: 0 1px 0 0;
				align-items: center;
				position: relative;
				border-style: solid;
				list-style: none;
				min-width: 100px;
				height: 56px;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.item:hover {
				color: #fff;
				background: #654b3c;
			}
	
	.menu-preview .el-menu-horizontal-demo .el-menu-item.item.is-active {
				color: #fff;
				background: #654b3c;
			}
	
	.banner-preview {
	  .el-carousel /deep/ .el-carousel__indicator button {
	    width: 0;
	    height: 0;
	    display: none;
	  }
	}
	
	.banner-preview .el-carousel /deep/ .el-carousel__container .el-carousel__arrow--left {
		width: 36px;
		font-size: 12px;
		height: 36px;
	}
	
	.banner-preview .el-carousel /deep/ .el-carousel__container .el-carousel__arrow--left:hover {
		background: #654b3c;
	}
	
	.banner-preview .el-carousel /deep/ .el-carousel__container .el-carousel__arrow--right {
		width: 36px;
		font-size: 12px;
		height: 36px;
	}
	
	.banner-preview .el-carousel /deep/ .el-carousel__container .el-carousel__arrow--right:hover {
		background: #654b3c;
	}

	.banner-preview .el-carousel /deep/ .el-carousel__indicators {
		padding: 0;
		margin: 0 0 10px;
		z-index: 2;
		position: absolute;
		list-style: none;
	}
	
	.banner-preview .el-carousel /deep/ .el-carousel__indicators li {
		border-radius: 10px;
		padding: 0;
		margin: 0 4px;
		background: #fff;
		display: inline-block;
		width: 12px;
		opacity: 0.4;
		transition: 0.3s;
		height: 12px;
	}
	
	.banner-preview .el-carousel /deep/ .el-carousel__indicators li:hover {
		padding: 0;
		margin: 0 4px;
		background: #fff;
		display: inline-block;
		width: 24px;
		opacity: 0.7;
		height: 12px;
	}
	
	.banner-preview .el-carousel /deep/ .el-carousel__indicators li.is-active {
		padding: 0;
		margin: 0 4px;
		background: #fff;
		display: inline-block;
		width: 24px;
		opacity: 1;
		height: 12px;
	}

    .chat-content {
        padding-bottom: 20px;
        width: 100%;
        margin-bottom: 10px;
        max-height: 300px;
        height: 300px;
        overflow-y: scroll;
        border: 1px solid #eeeeee;
        background: #fff;

        .left-content {
            float: left;
            margin-bottom: 10px;
            padding: 10px;
            max-width: 80%;
        }

        .right-content {
            float: right;
            margin-bottom: 10px;
            padding: 10px;
            max-width: 80%;
        }
    }

    .clear-float {
        clear: both;
    }


	
	// -------- search --------
	.main-containers .search .select /deep/ .el-input__inner {
				border: 0;
				border-radius: 30px 0 0 30px;
				padding: 0 0px 0 10px;
				box-shadow: #F6F6F6;
				color: #000;
				background: url(http://codegen.caihongy.cn/20231121/0655feaddd0a492b8c1bc3fbb312874e.png) no-repeat right center,#F6F6F6;
				width: 110px;
				font-size: 14px;
				height: 34px;
			}
	
	.main-containers .search .input /deep/ .el-input__inner {
				border: 0;
				border-radius: 0 30px 30px 0;
				padding: 0 10px;
				outline: none;
				color: #000;
				background: #F6F6F6;
				width: 150px;
				font-size: 14px;
				height: 34px;
			}
	// -------- search --------
	
	.main-containers .btn-service {
				border: 0;
				padding: 0 8px;
				margin: 0 10px;
				color: #654B3C;
				background: #efefef;
				width: auto;
				font-size: 14px;
				line-height: 32px;
				height: 32px;
			}
	
	.main-containers .btn-service:hover {
				color: #654B3C;
			}
	
	.main-containers .btn-shop {
				border: 0;
				padding: 0 8px;
				margin: 0 10px;
				color: #654B3C;
				background: #efefef;
				width: auto;
				font-size: 14px;
				line-height: 32px;
				height: 32px;
			}
	
	.main-containers .btn-shop:hover {
				color: #654B3C;
			}
</style>
