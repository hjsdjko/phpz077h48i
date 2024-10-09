import Vue from 'vue';
//配置路由
import VueRouter from 'vue-router'
Vue.use(VueRouter);
//1.创建组件
import Index from '@/views/index'
import Home from '@/views/home'
import Login from '@/views/login'
import NotFound from '@/views/404'
import UpdatePassword from '@/views/update-password'
import pay from '@/views/pay'
import register from '@/views/register'
import center from '@/views/center'
    import aboutus from '@/views/modules/aboutus/list'
    import shangpinkucun from '@/views/modules/shangpinkucun/list'
    import shangpinxinxi from '@/views/modules/shangpinxinxi/list'
    import menu from '@/views/modules/menu/list'
    import discussaixinjuankuan from '@/views/modules/discussaixinjuankuan/list'
    import shangjia from '@/views/modules/shangjia/list'
    import systemintro from '@/views/modules/systemintro/list'
    import yonghu from '@/views/modules/yonghu/list'
    import shangpinfenlei from '@/views/modules/shangpinfenlei/list'
    import juankuanxinxi from '@/views/modules/juankuanxinxi/list'
    import juankuangongshi from '@/views/modules/juankuangongshi/list'
    import discussshangpinxinxi from '@/views/modules/discussshangpinxinxi/list'
    import orders from '@/views/modules/orders/list'
    import shouhoushenqing from '@/views/modules/shouhoushenqing/list'
    import aixinjuankuan from '@/views/modules/aixinjuankuan/list'
    import shouhoufankui from '@/views/modules/shouhoufankui/list'
    import config from '@/views/modules/config/list'


//2.配置路由   注意：名字
export const routes = [{
    path: '/',
    name: '系统首页',
    component: Index,
    children: [{
      // 这里不设置值，是把main作为默认页面
      path: '/',
      name: '系统首页',
      component: Home,
      meta: {icon:'', title:'center', affix: true}
    }, {
      path: '/updatePassword',
      name: '修改密码',
      component: UpdatePassword,
      meta: {icon:'', title:'updatePassword'}
    }, {
      path: '/pay',
      name: '支付',
      component: pay,
      meta: {icon:'', title:'pay'}
    }, {
      path: '/center',
      name: '个人信息',
      component: center,
      meta: {icon:'', title:'center'}
    }
      ,{
	path: '/aboutus',
        name: '关于我们',
        component: aboutus
      }
      ,{
	path: '/shangpinkucun',
        name: '商品库存',
        component: shangpinkucun
      }
      ,{
	path: '/shangpinxinxi',
        name: '商品信息',
        component: shangpinxinxi
      }
      ,{
	path: '/menu',
        name: '菜单列表',
        component: menu
      }
      ,{
	path: '/discussaixinjuankuan',
        name: '爱心捐款评论',
        component: discussaixinjuankuan
      }
      ,{
	path: '/shangjia',
        name: '商家',
        component: shangjia
      }
      ,{
	path: '/systemintro',
        name: '系统简介',
        component: systemintro
      }
      ,{
	path: '/yonghu',
        name: '用户',
        component: yonghu
      }
      ,{
	path: '/shangpinfenlei',
        name: '商品分类',
        component: shangpinfenlei
      }
      ,{
	path: '/juankuanxinxi',
        name: '捐款信息',
        component: juankuanxinxi
      }
      ,{
	path: '/juankuangongshi',
        name: '捐款公示',
        component: juankuangongshi
      }
      ,{
	path: '/discussshangpinxinxi',
        name: '商品信息评论',
        component: discussshangpinxinxi
      }
      ,{
        path: '/orders/:status',
        name: '订单管理',
        component: orders
      }
      ,{
	path: '/shouhoushenqing',
        name: '售后申请',
        component: shouhoushenqing
      }
      ,{
	path: '/aixinjuankuan',
        name: '爱心捐款',
        component: aixinjuankuan
      }
      ,{
	path: '/shouhoufankui',
        name: '售后反馈',
        component: shouhoufankui
      }
      ,{
	path: '/config',
        name: '轮播图管理',
        component: config
      }
    ]
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {icon:'', title:'login'}
  },
  {
    path: '/register',
    name: 'register',
    component: register,
    meta: {icon:'', title:'register'}
  },
  {
    path: '*',
    component: NotFound
  }
]
//3.实例化VueRouter  注意：名字
const router = new VueRouter({
  mode: 'hash',
  /*hash模式改为history*/
  routes // （缩写）相当于 routes: routes
})
const originalPush = VueRouter.prototype.push
//修改原型对象中的push方法
VueRouter.prototype.push = function push(location) {
   return originalPush.call(this, location).catch(err => err)
}
export default router;
