import VueRouter from 'vue-router'

//引入组件
import Index from '../pages'
import Home from '../pages/home/home'
import Login from '../pages/login/login'
import Register from '../pages/register/register'
import Center from '../pages/center/center'
import Storeup from '../pages/storeup/list'
import AddrList from '../pages/shop-address/list'
import AddrAdd from '../pages/shop-address/addOrUpdate'
import Order from '../pages/shop-order/list'
import OrderConfirm from '../pages/shop-order/confirm'
import Cart from '../pages/shop-cart/list'
import payList from '../pages/pay'

import yonghuList from '../pages/yonghu/list'
import yonghuDetail from '../pages/yonghu/detail'
import yonghuAdd from '../pages/yonghu/add'
import shangjiaList from '../pages/shangjia/list'
import shangjiaDetail from '../pages/shangjia/detail'
import shangjiaAdd from '../pages/shangjia/add'
import shangpinfenleiList from '../pages/shangpinfenlei/list'
import shangpinfenleiDetail from '../pages/shangpinfenlei/detail'
import shangpinfenleiAdd from '../pages/shangpinfenlei/add'
import shangpinkucunList from '../pages/shangpinkucun/list'
import shangpinkucunDetail from '../pages/shangpinkucun/detail'
import shangpinkucunAdd from '../pages/shangpinkucun/add'
import shangpinxinxiList from '../pages/shangpinxinxi/list'
import shangpinxinxiDetail from '../pages/shangpinxinxi/detail'
import shangpinxinxiAdd from '../pages/shangpinxinxi/add'
import aixinjuankuanList from '../pages/aixinjuankuan/list'
import aixinjuankuanDetail from '../pages/aixinjuankuan/detail'
import aixinjuankuanAdd from '../pages/aixinjuankuan/add'
import juankuanxinxiList from '../pages/juankuanxinxi/list'
import juankuanxinxiDetail from '../pages/juankuanxinxi/detail'
import juankuanxinxiAdd from '../pages/juankuanxinxi/add'
import juankuangongshiList from '../pages/juankuangongshi/list'
import juankuangongshiDetail from '../pages/juankuangongshi/detail'
import juankuangongshiAdd from '../pages/juankuangongshi/add'
import shouhoushenqingList from '../pages/shouhoushenqing/list'
import shouhoushenqingDetail from '../pages/shouhoushenqing/detail'
import shouhoushenqingAdd from '../pages/shouhoushenqing/add'
import shouhoufankuiList from '../pages/shouhoufankui/list'
import shouhoufankuiDetail from '../pages/shouhoufankui/detail'
import shouhoufankuiAdd from '../pages/shouhoufankui/add'
import aboutusList from '../pages/aboutus/list'
import aboutusDetail from '../pages/aboutus/detail'
import aboutusAdd from '../pages/aboutus/add'
import systemintroList from '../pages/systemintro/list'
import systemintroDetail from '../pages/systemintro/detail'
import systemintroAdd from '../pages/systemintro/add'
import menuList from '../pages/menu/list'
import menuDetail from '../pages/menu/detail'
import menuAdd from '../pages/menu/add'
import discussshangpinxinxiList from '../pages/discussshangpinxinxi/list'
import discussshangpinxinxiDetail from '../pages/discussshangpinxinxi/detail'
import discussshangpinxinxiAdd from '../pages/discussshangpinxinxi/add'
import discussaixinjuankuanList from '../pages/discussaixinjuankuan/list'
import discussaixinjuankuanDetail from '../pages/discussaixinjuankuan/detail'
import discussaixinjuankuanAdd from '../pages/discussaixinjuankuan/add'

const originalPush = VueRouter.prototype.push
VueRouter.prototype.push = function push(location) {
	return originalPush.call(this, location).catch(err => err)
}

//配置路由
export default new VueRouter({
	routes:[
		{
      path: '/',
      redirect: '/index/home'
    },
		{
			path: '/index',
			component: Index,
			children:[
				{
					path: 'home',
					component: Home
				},
				{
					path: 'center',
					component: Center,
				},
				{
					path: 'pay',
					component: payList,
				},
				{
					path: 'storeup',
					component: Storeup
				},
                {
                    path: 'shop-address/list',
                    component: AddrList
                },
                {
                    path: 'shop-address/addOrUpdate',
                    component: AddrAdd
                },
				{
					path: 'shop-order/order',
					component: Order
				},
				{
					path: 'cart',
					component: Cart
				},
				{
					path: 'shop-order/orderConfirm',
					component: OrderConfirm
				},
				{
					path: 'yonghu',
					component: yonghuList
				},
				{
					path: 'yonghuDetail',
					component: yonghuDetail
				},
				{
					path: 'yonghuAdd',
					component: yonghuAdd
				},
				{
					path: 'shangjia',
					component: shangjiaList
				},
				{
					path: 'shangjiaDetail',
					component: shangjiaDetail
				},
				{
					path: 'shangjiaAdd',
					component: shangjiaAdd
				},
				{
					path: 'shangpinfenlei',
					component: shangpinfenleiList
				},
				{
					path: 'shangpinfenleiDetail',
					component: shangpinfenleiDetail
				},
				{
					path: 'shangpinfenleiAdd',
					component: shangpinfenleiAdd
				},
				{
					path: 'shangpinkucun',
					component: shangpinkucunList
				},
				{
					path: 'shangpinkucunDetail',
					component: shangpinkucunDetail
				},
				{
					path: 'shangpinkucunAdd',
					component: shangpinkucunAdd
				},
				{
					path: 'shangpinxinxi',
					component: shangpinxinxiList
				},
				{
					path: 'shangpinxinxiDetail',
					component: shangpinxinxiDetail
				},
				{
					path: 'shangpinxinxiAdd',
					component: shangpinxinxiAdd
				},
				{
					path: 'aixinjuankuan',
					component: aixinjuankuanList
				},
				{
					path: 'aixinjuankuanDetail',
					component: aixinjuankuanDetail
				},
				{
					path: 'aixinjuankuanAdd',
					component: aixinjuankuanAdd
				},
				{
					path: 'juankuanxinxi',
					component: juankuanxinxiList
				},
				{
					path: 'juankuanxinxiDetail',
					component: juankuanxinxiDetail
				},
				{
					path: 'juankuanxinxiAdd',
					component: juankuanxinxiAdd
				},
				{
					path: 'juankuangongshi',
					component: juankuangongshiList
				},
				{
					path: 'juankuangongshiDetail',
					component: juankuangongshiDetail
				},
				{
					path: 'juankuangongshiAdd',
					component: juankuangongshiAdd
				},
				{
					path: 'shouhoushenqing',
					component: shouhoushenqingList
				},
				{
					path: 'shouhoushenqingDetail',
					component: shouhoushenqingDetail
				},
				{
					path: 'shouhoushenqingAdd',
					component: shouhoushenqingAdd
				},
				{
					path: 'shouhoufankui',
					component: shouhoufankuiList
				},
				{
					path: 'shouhoufankuiDetail',
					component: shouhoufankuiDetail
				},
				{
					path: 'shouhoufankuiAdd',
					component: shouhoufankuiAdd
				},
				{
					path: 'aboutus',
					component: aboutusList
				},
				{
					path: 'aboutusDetail',
					component: aboutusDetail
				},
				{
					path: 'aboutusAdd',
					component: aboutusAdd
				},
				{
					path: 'systemintro',
					component: systemintroList
				},
				{
					path: 'systemintroDetail',
					component: systemintroDetail
				},
				{
					path: 'systemintroAdd',
					component: systemintroAdd
				},
				{
					path: 'menu',
					component: menuList
				},
				{
					path: 'menuDetail',
					component: menuDetail
				},
				{
					path: 'menuAdd',
					component: menuAdd
				},
				{
					path: 'discussshangpinxinxi',
					component: discussshangpinxinxiList
				},
				{
					path: 'discussshangpinxinxiDetail',
					component: discussshangpinxinxiDetail
				},
				{
					path: 'discussshangpinxinxiAdd',
					component: discussshangpinxinxiAdd
				},
				{
					path: 'discussaixinjuankuan',
					component: discussaixinjuankuanList
				},
				{
					path: 'discussaixinjuankuanDetail',
					component: discussaixinjuankuanDetail
				},
				{
					path: 'discussaixinjuankuanAdd',
					component: discussaixinjuankuanAdd
				},
			]
		},
		{
			path: '/login',
			component: Login
		},
		{
			path: '/register',
			component: Register
		},
	]
})
