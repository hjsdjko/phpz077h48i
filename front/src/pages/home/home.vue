<template>
<div class="home-preview" :style='{"width":"100%","margin":"0px auto","flexDirection":"column","display":"flex"}'>



		<!-- 关于我们 -->
		<div id="about" class="animate__animated" :style='{"padding":"40px 0px 68px","boxShadow":"0 1px 6px rgba(255, 255, 255, .3)","margin":"0 auto","flexWrap":"wrap","background":"#fff","display":"flex","width":"80%","position":"relative","justifyContent":"space-between","height":"auto","order":"3"}'>
		  <div :style='{"margin":"0 auto 30px","color":"#654B3C","textAlign":"center","background":"#fff","width":"420px","fontSize":"54px","position":"relative","zIndex":"1"}'>{{aboutUsDetail.title}}</div>
		  <div :style='{"width":"100%","margin":"10px 0","fontSize":"20px","color":"#999","textAlign":"center","display":"none"}'>{{aboutUsDetail.subtitle}}</div>
		  <div :style='{"width":"450px","padding":"0 0px","flexWrap":"wrap","display":"flex","height":"420px","order":"3"}'>
		    <img :style='{"width":"100%","objectFit":"cover","display":"block","height":"100%"}' :src="baseUrl + aboutUsDetail.picture1">
		    <img :style='{"margin":"0 10px","objectFit":"cover","flex":1,"display":"none","height":"120px"}' :src="baseUrl + aboutUsDetail.picture2">
		    <img :style='{"margin":"0 10px","objectFit":"cover","flex":1,"display":"none","height":"120px"}' :src="baseUrl + aboutUsDetail.picture3">
		  </div>
		  <div :style='{"padding":"0","margin":"100px 0 0 50px","overflow":"hidden","color":"#333","background":"#fff","width":"calc(100% - 500px)","lineHeight":"24px","fontSize":"16px","order":"4","height":"196px"}' v-html="aboutUsDetail.content"></div>
		  <div :style='{"width":"100%","position":"absolute","top":"73px","background":"#654B3C","display":"block","height":"5px"}' />
		  <div :style='{"width":"100%","background":"#fff","display":"block","height":"1px","order":"2"}' />
		  <div :style='{"width":"285px","background":"url(http://codegen.caihongy.cn/20201114/7856ba26477849ea828f481fa2773a95.jpg) 0% 0% / cover no-repeat","display":"none","height":"100px"}' />
		  <div :style='{"width":"285px","background":"url(http://codegen.caihongy.cn/20201114/7856ba26477849ea828f481fa2773a95.jpg) 0% 0% / cover no-repeat","display":"none","height":"100px"}' />
		  <div :style='{"border":"0","margin":"0","top":"480px","left":"530px","background":"none","display":"block","width":"auto","lineHeight":"32px","position":"absolute","order":"20"}' @click="toDetail('aboutusDetail',aboutUsDetail)">
		    <span :style='{"color":"#999","fontSize":"18px"}'>查看更多</span>
		    <span class="icon iconfont icon-gengduo1" :style='{"color":"#333","fontSize":"124px","display":"none"}'></span>
		  </div>
		</div>
		<!-- 关于我们 -->

		<!-- 系统简介 -->
		<div id="system" class="animate__animated" :style='{"padding":"50px 0","margin":"0","flexWrap":"wrap","background":"#f1f1f1","display":"flex","width":"100%","position":"relative","height":"850px","order":"4"}'>
		  <div :style='{"width":"80%","boxShadow":"0 5px 0 #654B3C","margin":"0 auto 20px","fontSize":"54px","color":"#654B3C","height":"80px"}'>{{systemIntroductionDetail.title}}</div>
		  <div :style='{"width":"100%","margin":"0 0 10px","fontSize":"20px","color":"#999","textAlign":"center","display":"none"}'>{{systemIntroductionDetail.subtitle}}</div>
		  <div :style='{"padding":"0 0px","top":"160px","flexWrap":"wrap","left":"10%","display":"flex","width":"80%","position":"absolute","height":"auto"}'>
		    <img :style='{"width":"calc(30% - 20px)","margin":"0 20px 0 0","objectFit":"cover","display":"block","height":"170px"}' :src="baseUrl + systemIntroductionDetail.picture1">
		    <img :style='{"width":"calc(30% - 20px)","margin":"0 20px 0 0","objectFit":"cover","display":"block","height":"170px"}' :src="baseUrl + systemIntroductionDetail.picture2">
		    <img :style='{"width":"40%","margin":"0 0px","objectFit":"cover","display":"block","height":"380px"}' :src="baseUrl + systemIntroductionDetail.picture3">
		  </div>
		  <div :style='{"padding":"0 20px","margin":"0 0 10px 0","overflow":"hidden","color":"#212121","top":"360px","left":"10%","background":"none","width":"calc(49% - 40px)","lineHeight":"24px","fontSize":"16px","position":"absolute","height":"168px"}' v-html="systemIntroductionDetail.content"></div>
		  <div :style='{"backgroundImage":"url(http://codegen.caihongy.cn/20231114/1fc71f04242241159ad6c4078cc10e8d.png)","bottom":"0","display":"block","width":"100%","backgroundSize":"100% 100%","position":"absolute","height":"200px"}' />
		  <div :style='{"width":"285px","background":"url(http://codegen.caihongy.cn/20201114/7856ba26477849ea828f481fa2773a95.jpg) 0% 0% / cover no-repeat","display":"none","height":"100px"}' />
		  <div :style='{"width":"285px","background":"url(http://codegen.caihongy.cn/20201114/7856ba26477849ea828f481fa2773a95.jpg) 0% 0% / cover no-repeat","display":"none","height":"100px"}' />
		  <div :style='{"width":"285px","background":"url(http://codegen.caihongy.cn/20201114/7856ba26477849ea828f481fa2773a95.jpg) 0% 0% / cover no-repeat","display":"none","height":"100px"}' />
		  <div :style='{"border":"0","margin":"10px auto","textAlign":"center","background":"#409EFF","display":"none","width":"80px","lineHeight":"32px"}' @click="toDetail('systemintroDetail',systemIntroductionDetail)">
		    <span :style='{"color":"#f5f5f5","fontSize":"12px"}'>更多</span>
		    <span class="icon iconfont icon-gengduo1" :style='{"color":"#f5f5f5","fontSize":"12px"}'></span>
		  </div>
		</div>
		<!-- 系统简介 -->
		


<!-- 商品推荐 -->
<div id="animate_recommendshangpinxinxi" class="recommend animate__animated" :style='{"padding":"50px 0","margin":"0","position":"relative","background":"#f1f1f1","order":"1"}'>
	<div v-if="false" class="idea recommendIdea" :style='{"padding":"20px","flexWrap":"wrap","background":"#efefef","justifyContent":"space-between","display":"flex"}'>
		<div class="box1" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box2" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box3" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box4" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box5" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box6" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box7" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box8" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box9" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box10" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
	</div>
	
    <div class="title" :style='{"width":"80%","boxShadow":"0 5px 0 #654B3C","margin":"10px auto"}'>
		<span :style='{"color":"#654B3C","fontSize":"54px"}'>商品信息推荐</span>
	</div>
	
	
	
	
	
	
	
	
	
	



	<div v-if="shangpinxinxiRecommend.length" class="list list12 index-pv1 list12shangpinxinxi" :style='{"width":"80%","padding":"10px 0","margin":"0 auto","height":"auto"}'>
	  <div class="list" :style='{"overflow":"hidden","flex":"1","justifyContent":"space-around","display":"flex","height":"auto"}'>
	    <div :style='{"width":"16%","position":"relative","background":"#fff","height":"250px"}' class="item list-item animation-box" v-for="item,index in shangpinxinxiRecommend" :key="index" @click="toDetail('shangpinxinxiDetail', item)">
			<img :name="item.id" :style='{"width":"100%","objectFit":"cover","display":"block","height":"190px"}' v-if="preHttp(item.tupian)" :src="item.tupian.split(',')[0]" alt="" />
			<img :name="item.id" :style='{"width":"100%","objectFit":"cover","display":"block","height":"190px"}' v-else :src="baseUrl + (item.tupian?item.tupian.split(',')[0]:'')" alt="" />
			<div class="line1" :style='{"padding":"0 10px","overflow":"hidden","color":"#333","textAlign":"center","lineHeight":"30px","fontSize":"18px","height":"30px"}'>{{item.shangpinbianhao}}</div>
			<div class="line1" :style='{"padding":"0 10px","overflow":"hidden","color":"#333","textAlign":"center","lineHeight":"30px","fontSize":"18px","height":"30px"}'>{{item.shangpinmingcheng}}</div>
			<div class="line1" :style='{"padding":"0 10px","overflow":"hidden","color":"#333","textAlign":"center","lineHeight":"30px","fontSize":"18px","height":"30px"}'>上架时间:{{item.shangjiashijian}}</div>
	    </div>
	  </div>
	</div>




	
	<div @click="moreBtn('shangpinxinxi')" :style='{"border":"0","margin":"10px auto","top":"80px","textAlign":"center","display":"block","width":"80px","lineHeight":"32px","position":"absolute","right":"10%"}'>
		<span :style='{"color":"#9E9E9E","fontSize":"24px"}'>更多</span>
		<i :style='{"color":"#9E9E9E","fontSize":"24px"}' class="icon iconfont icon-gengduo1"></i>
	</div>
	
</div>
<!-- 商品推荐 -->

<!-- 商品推荐 -->
<div id="animate_recommendaixinjuankuan" class="recommend animate__animated" :style='{"padding":"50px 0","margin":"0","position":"relative","background":"#f1f1f1","order":"1"}'>
	<div v-if="false" class="idea recommendIdea" :style='{"padding":"20px","flexWrap":"wrap","background":"#efefef","justifyContent":"space-between","display":"flex"}'>
		<div class="box1" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box2" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box3" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box4" :style='{"width":"20%","background":"#fff","height":"80px"}'></div>
		<div class="box5" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box6" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box7" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box8" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box9" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box10" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
	</div>
	
    <div class="title" :style='{"width":"80%","boxShadow":"0 5px 0 #654B3C","margin":"10px auto"}'>
		<span :style='{"color":"#654B3C","fontSize":"54px"}'>爱心捐款推荐</span>
	</div>
	
	
	
	
	
	
	
	
	
	



	<div v-if="aixinjuankuanRecommend.length" class="list list12 index-pv1 list12aixinjuankuan" :style='{"width":"80%","padding":"10px 0","margin":"0 auto","height":"auto"}'>
	  <div class="list" :style='{"overflow":"hidden","flex":"1","justifyContent":"space-around","display":"flex","height":"auto"}'>
	    <div :style='{"width":"16%","position":"relative","background":"#fff","height":"250px"}' class="item list-item animation-box" v-for="item,index in aixinjuankuanRecommend" :key="index" @click="toDetail('aixinjuankuanDetail', item)">
			<img :name="item.id" :style='{"width":"100%","objectFit":"cover","display":"block","height":"190px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
			<img :name="item.id" :style='{"width":"100%","objectFit":"cover","display":"block","height":"190px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
			<div class="line1" :style='{"padding":"0 10px","overflow":"hidden","color":"#333","textAlign":"center","lineHeight":"30px","fontSize":"18px","height":"30px"}'>{{item.juankuanxiangmu}}</div>
	    </div>
	  </div>
	</div>




	
	<div @click="moreBtn('aixinjuankuan')" :style='{"border":"0","margin":"10px auto","top":"80px","textAlign":"center","display":"block","width":"80px","lineHeight":"32px","position":"absolute","right":"10%"}'>
		<span :style='{"color":"#9E9E9E","fontSize":"24px"}'>更多</span>
		<i :style='{"color":"#9E9E9E","fontSize":"24px"}' class="icon iconfont icon-gengduo1"></i>
	</div>
	
</div>
<!-- 商品推荐 -->


<!-- 特价商品 -->
<div id="animate_listshangpinxinxi" class="lists animate__animated" :style='{"padding":"50px 0 0","margin":"0","position":"relative","background":"#f1f1f1","order":"2"}'>
	
	<div class="title" :style='{"width":"80%","boxShadow":"0 5px 0 #654B3C","margin":"10px auto"}'>
	  <span :style='{"color":"#654B3C","fontSize":"54px"}'>商品信息展示</span>
	</div>
	
	
	
	
	
	
	
	
	
	






	<div class="list list15 index-pv1" :style='{"padding":"0px","margin":"20px auto 30px","alignItems":"center","display":"flex","width":"80%","justifyContent":"center","height":"auto"}'>
	  <div :style='{"width":"39%","height":"auto"}' class="list left">
		<template v-if="shangpinxinxiList.length">
	    <template v-for="item,index in shangpinxinxiList">
		<div v-if="index == 0" @click="toDetail('shangpinxinxiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.tupian)" :src="item.tupian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.tupian?item.tupian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinbianhao}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinmingcheng}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>上架时间:{{item.shangjiashijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
		<template v-if="shangpinxinxiList.length > 1">
		<template v-for="item,index in shangpinxinxiList">
	    <div v-if="index == 1" @click="toDetail('shangpinxinxiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box2 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.tupian)" :src="item.tupian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.tupian?item.tupian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinbianhao}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinmingcheng}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>上架时间:{{item.shangjiashijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
	  </div>
	  <div :style='{"width":"20%","margin":"0 2%","height":"auto"}' class="list center">
		<template v-if="shangpinxinxiList.length > 2">
			<template v-for="item,index in shangpinxinxiList">
				<div v-if="index == 2" @click="toDetail('shangpinxinxiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
					<img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-if="preHttp(item.tupian)" :src="item.tupian.split(',')[0]" alt="" />
					<img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-else :src="baseUrl + (item.tupian?item.tupian.split(',')[0]:'')" alt="" />
					<div class="info">
						<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinbianhao}}</div>
						<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinmingcheng}}</div>
						<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>上架时间:{{item.shangjiashijian}}</div>
					</div>
				</div>
			</template>
		</template>
	    <div :style='{"padding":"0","margin":"10px auto","alignItems":"center","borderRadius":"50%","background":"#654B3C","flexDirection":"column","display":"flex","width":"220px","justifyContent":"center","height":"220px"}' class="box2" v-if="shangpinxinxiList.length > 2">
			<div :style='{"padding":"0 15px","fontSize":"22px","lineHeight":"30px","overflow":"hidden","color":"#fff","height":"60px"}' class="title">{{shangpinxinxiList[2].shangpinbianhao}}</div>
			<div :style='{"padding":"0 15px","fontSize":"16px","lineHeight":"30px","overflow":"hidden","color":"#fff","height":"60px"}' class="desc">{{shangpinxinxiList[2].shangpinxiangqing}}</div>
	    </div>
		<template v-if="shangpinxinxiList.length > 3">
		<template v-for="item,index in shangpinxinxiList">
	    <div v-if="index == 3" @click="toDetail('shangpinxinxiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box3 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-if="preHttp(item.tupian)" :src="item.tupian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-else :src="baseUrl + (item.tupian?item.tupian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinbianhao}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinmingcheng}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>上架时间:{{item.shangjiashijian}}</div>
		  </div>
	    </div>
		</template>
		</template>
	  </div>
	  <div :style='{"width":"39%","height":"auto"}' class="list right">
	    <template v-if="shangpinxinxiList.length > 4">
	    <template v-for="item,index in shangpinxinxiList">
	    <div v-if="index == 4" @click="toDetail('shangpinxinxiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.tupian)" :src="item.tupian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.tupian?item.tupian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinbianhao}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinmingcheng}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>上架时间:{{item.shangjiashijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
		<template v-if="shangpinxinxiList.length > 5">
		<template v-for="item,index in shangpinxinxiList">
	    <div v-if="index == 5" @click="toDetail('shangpinxinxiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box2 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.tupian)" :src="item.tupian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.tupian?item.tupian.split(',')[0]:'')" alt="" />
	      <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinbianhao}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.shangpinmingcheng}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>上架时间:{{item.shangjiashijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
	  </div>
	</div>
	
	
	<div @click="moreBtn('shangpinxinxi')" :style='{"border":"0","margin":"10px auto","top":"80px","textAlign":"center","display":"block","width":"80px","lineHeight":"32px","position":"absolute","right":"10%"}'>
		<span :style='{"color":"#9E9E9E","fontSize":"24px"}'>更多</span>
		<i :style='{"color":"#9E9E9E","fontSize":"24px"}' class="icon iconfont icon-gengduo1"></i>
	</div>
	
	<div v-if="true" class="idea" :style='{"backgroundSize":"100% 100%","flexWrap":"wrap","backgroundImage":"url(http://codegen.caihongy.cn/20231114/860fdc8ab9484bc0909d0f94f81dd5ac.png)","justifyContent":"space-between","display":"flex","height":"210px"}'>
		<div class="box1" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box2" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box3" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box4" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box5" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box6" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box7" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box8" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box9" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box10" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
	</div>

</div>
<!-- 特价商品 -->

<!-- 特价商品 -->
<div id="animate_listaixinjuankuan" class="lists animate__animated" :style='{"padding":"50px 0 0","margin":"0","position":"relative","background":"#f1f1f1","order":"2"}'>
	
	<div class="title" :style='{"width":"80%","boxShadow":"0 5px 0 #654B3C","margin":"10px auto"}'>
	  <span :style='{"color":"#654B3C","fontSize":"54px"}'>爱心捐款展示</span>
	</div>
	
	
	
	
	
	
	
	
	
	






	<div class="list list15 index-pv1" :style='{"padding":"0px","margin":"20px auto 30px","alignItems":"center","display":"flex","width":"80%","justifyContent":"center","height":"auto"}'>
	  <div :style='{"width":"39%","height":"auto"}' class="list left">
		<template v-if="aixinjuankuanList.length">
	    <template v-for="item,index in aixinjuankuanList">
		<div v-if="index == 0" @click="toDetail('aixinjuankuanDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
	      </div>
	    </div>
		</template>
		</template>
		<template v-if="aixinjuankuanList.length > 1">
		<template v-for="item,index in aixinjuankuanList">
	    <div v-if="index == 1" @click="toDetail('aixinjuankuanDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box2 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
	      </div>
	    </div>
		</template>
		</template>
	  </div>
	  <div :style='{"width":"20%","margin":"0 2%","height":"auto"}' class="list center">
		<template v-if="aixinjuankuanList.length > 2">
			<template v-for="item,index in aixinjuankuanList">
				<div v-if="index == 2" @click="toDetail('aixinjuankuanDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
					<img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
					<img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
					<div class="info">
						<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
					</div>
				</div>
			</template>
		</template>
	    <div :style='{"padding":"0","margin":"10px auto","alignItems":"center","borderRadius":"50%","background":"#654B3C","flexDirection":"column","display":"flex","width":"220px","justifyContent":"center","height":"220px"}' class="box2" v-if="aixinjuankuanList.length > 2">
			<div :style='{"padding":"0 15px","fontSize":"22px","lineHeight":"30px","overflow":"hidden","color":"#fff","height":"60px"}' class="title">{{aixinjuankuanList[2].juankuanxiangmu}}</div>
			<div :style='{"padding":"0 15px","fontSize":"16px","lineHeight":"30px","overflow":"hidden","color":"#fff","height":"60px"}' class="desc">{{aixinjuankuanList[2].juanzengmude}}</div>
	    </div>
		<template v-if="aixinjuankuanList.length > 3">
		<template v-for="item,index in aixinjuankuanList">
	    <div v-if="index == 3" @click="toDetail('aixinjuankuanDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box3 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
		  </div>
	    </div>
		</template>
		</template>
	  </div>
	  <div :style='{"width":"39%","height":"auto"}' class="list right">
	    <template v-if="aixinjuankuanList.length > 4">
	    <template v-for="item,index in aixinjuankuanList">
	    <div v-if="index == 4" @click="toDetail('aixinjuankuanDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
	      </div>
	    </div>
		</template>
		</template>
		<template v-if="aixinjuankuanList.length > 5">
		<template v-for="item,index in aixinjuankuanList">
	    <div v-if="index == 5" @click="toDetail('aixinjuankuanDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box2 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
	      <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
	      </div>
	    </div>
		</template>
		</template>
	  </div>
	</div>
	
	
	<div @click="moreBtn('aixinjuankuan')" :style='{"border":"0","margin":"10px auto","top":"80px","textAlign":"center","display":"block","width":"80px","lineHeight":"32px","position":"absolute","right":"10%"}'>
		<span :style='{"color":"#9E9E9E","fontSize":"24px"}'>更多</span>
		<i :style='{"color":"#9E9E9E","fontSize":"24px"}' class="icon iconfont icon-gengduo1"></i>
	</div>
	
	<div v-if="true" class="idea" :style='{"backgroundSize":"100% 100%","flexWrap":"wrap","backgroundImage":"url(http://codegen.caihongy.cn/20231114/860fdc8ab9484bc0909d0f94f81dd5ac.png)","justifyContent":"space-between","display":"flex","height":"210px"}'>
		<div class="box1" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box2" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box3" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box4" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box5" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box6" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box7" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box8" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box9" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box10" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
	</div>

</div>
<!-- 特价商品 -->

<!-- 特价商品 -->
<div id="animate_listjuankuangongshi" class="lists animate__animated" :style='{"padding":"50px 0 0","margin":"0","position":"relative","background":"#f1f1f1","order":"2"}'>
	
	<div class="title" :style='{"width":"80%","boxShadow":"0 5px 0 #654B3C","margin":"10px auto"}'>
	  <span :style='{"color":"#654B3C","fontSize":"54px"}'>捐款公示展示</span>
	</div>
	
	
	
	
	
	
	
	
	
	






	<div class="list list15 index-pv1" :style='{"padding":"0px","margin":"20px auto 30px","alignItems":"center","display":"flex","width":"80%","justifyContent":"center","height":"auto"}'>
	  <div :style='{"width":"39%","height":"auto"}' class="list left">
		<template v-if="juankuangongshiList.length">
	    <template v-for="item,index in juankuangongshiList">
		<div v-if="index == 0" @click="toDetail('juankuangongshiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>公示时间:{{item.gongshishijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
		<template v-if="juankuangongshiList.length > 1">
		<template v-for="item,index in juankuangongshiList">
	    <div v-if="index == 1" @click="toDetail('juankuangongshiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box2 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>公示时间:{{item.gongshishijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
	  </div>
	  <div :style='{"width":"20%","margin":"0 2%","height":"auto"}' class="list center">
		<template v-if="juankuangongshiList.length > 2">
			<template v-for="item,index in juankuangongshiList">
				<div v-if="index == 2" @click="toDetail('juankuangongshiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
					<img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
					<img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
					<div class="info">
						<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
						<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>公示时间:{{item.gongshishijian}}</div>
					</div>
				</div>
			</template>
		</template>
	    <div :style='{"padding":"0","margin":"10px auto","alignItems":"center","borderRadius":"50%","background":"#654B3C","flexDirection":"column","display":"flex","width":"220px","justifyContent":"center","height":"220px"}' class="box2" v-if="juankuangongshiList.length > 2">
			<div :style='{"padding":"0 15px","fontSize":"22px","lineHeight":"30px","overflow":"hidden","color":"#fff","height":"60px"}' class="title">{{juankuangongshiList[2].juankuanxiangmu}}</div>
	    </div>
		<template v-if="juankuangongshiList.length > 3">
		<template v-for="item,index in juankuangongshiList">
	    <div v-if="index == 3" @click="toDetail('juankuangongshiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box3 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"160px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>公示时间:{{item.gongshishijian}}</div>
		  </div>
	    </div>
		</template>
		</template>
	  </div>
	  <div :style='{"width":"39%","height":"auto"}' class="list right">
	    <template v-if="juankuangongshiList.length > 4">
	    <template v-for="item,index in juankuangongshiList">
	    <div v-if="index == 4" @click="toDetail('juankuangongshiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box1 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
		  <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>公示时间:{{item.gongshishijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
		<template v-if="juankuangongshiList.length > 5">
		<template v-for="item,index in juankuangongshiList">
	    <div v-if="index == 5" @click="toDetail('juankuangongshiDetail', item)" :style='{"width":"100%","margin":"10px 0","position":"relative","background":"#fff","height":"auto"}' class="box2 list-item animation-box">
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-if="preHttp(item.fengmian)" :src="item.fengmian.split(',')[0]" alt="" />
		  <img :name="item.id" :style='{"width":"100% ","objectFit":"cover","display":"block","height":"180px"}' v-else :src="baseUrl + (item.fengmian?item.fengmian.split(',')[0]:'')" alt="" />
	      <div class="info">
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>{{item.juankuanxiangmu}}</div>
			<div class="line1" :style='{"color":"#fff","fontSize":"24px","lineHeight":"54px"}'>公示时间:{{item.gongshishijian}}</div>
	      </div>
	    </div>
		</template>
		</template>
	  </div>
	</div>
	
	
	<div @click="moreBtn('juankuangongshi')" :style='{"border":"0","margin":"10px auto","top":"80px","textAlign":"center","display":"block","width":"80px","lineHeight":"32px","position":"absolute","right":"10%"}'>
		<span :style='{"color":"#9E9E9E","fontSize":"24px"}'>更多</span>
		<i :style='{"color":"#9E9E9E","fontSize":"24px"}' class="icon iconfont icon-gengduo1"></i>
	</div>
	
	<div v-if="true" class="idea" :style='{"backgroundSize":"100% 100%","flexWrap":"wrap","backgroundImage":"url(http://codegen.caihongy.cn/20231114/860fdc8ab9484bc0909d0f94f81dd5ac.png)","justifyContent":"space-between","display":"flex","height":"210px"}'>
		<div class="box1" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box2" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box3" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box4" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box5" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box6" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box7" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box8" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box9" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
		<div class="box10" :style='{"width":"20%","background":"#fff","display":"none","height":"80px"}'></div>
	</div>

</div>
<!-- 特价商品 -->
	
</div>
</template>

<script>
import 'animate.css'
import Swiper from "swiper";

  export default {
    //数据集合
    data() {
      return {
        baseUrl: '',
        aboutUsDetail: {},
        systemIntroductionDetail: {},
        newsList: [],
        shangpinxinxiRecommend: [],
        aixinjuankuanRecommend: [],

        shangpinxinxiList: [],
        aixinjuankuanList: [],
        juankuangongshiList: [],


		recommendIndex12shangpinxinxi: 0,
		recommendList12shangpinxinxi: [],
		recommendColumn12shangpinxinxi: '',


      }
    },
    created() {
		this.baseUrl = this.$config.baseUrl;
		this.getAboutUs();
		this.getSystemIntroduction();
		this.getList();
		this.shangpinxinxiRecommendCate()
    },
	mounted() {
		window.addEventListener('scroll', this.handleScroll)
		setTimeout(()=>{
			this.handleScroll()
		},100)
		
		this.swiperChanges()
	},
	beforeDestroy() {
	  window.removeEventListener('scroll', this.handleScroll)
	},
    //方法集合
    methods: {
		swiperChanges() {
			setTimeout(()=>{
			},750)
		},
		shangpinxinxiRecommendCate(){
			this.$http.get('shangpinfenlei/list',{}).then(res => {
			  if (res.data.code == 0) {
				this.recommendList12shangpinxinxi = res.data.data.list
			  }
			});
			this.recommendColumn12shangpinxinxi = 'shangpinfenlei'
		},
		recommendIndexClick12(index, name) {
			this['recommendIndex12' + name] = index
			this.getList()
			
			document.querySelectorAll('.recommend .list12' + name + ' .list .item').forEach(el => {
			  el.classList.remove("active")
			})
			setTimeout(() => {
			  document.querySelectorAll('.recommend .list12' + name + ' .list .item').forEach(el => {
			    el.classList.add("active")
			  })
			}, 1);
		},


		handleScroll() {
			let arr = [
				{id:'search',css:'animate__bounce'},
				{id:'about',css:'animate__bounceIn'},
				{id:'system',css:'animate__bounceInUp'},
				{id:'animate_recommendshangpinxinxi',css:'animate__zoomInDown'},
				{id:'animate_listshangpinxinxi',css:'animate__jackInTheBox'},
				{id:'animate_recommendaixinjuankuan',css:'animate__zoomInDown'},
				{id:'animate_listaixinjuankuan',css:'animate__jackInTheBox'},
				{id:'animate_listjuankuangongshi',css:'animate__jackInTheBox'},
				{id:'msgs',css:'animate__tada'},
				{id:'friendly',css:'animate__bounce'}
			]
			
			for (let i in arr) {
				let doc = document.getElementById(arr[i].id)
				if (doc) {
					let top = doc.offsetTop
					let win_top = window.innerHeight + window.pageYOffset
					// console.log(top,win_top)
					if (win_top > top && doc.classList.value.indexOf(arr[i].css) < 0) {
						// console.log(doc)
						doc.classList.add(arr[i].css)
					}
				}
			}
		},
      preHttp(str) {
          return str && str.substr(0,4)=='http';
      },
      getAboutUs() {
          this.$http.get('aboutus/detail/1', {}).then(res => {
            if(res.data.code == 0) {
              this.aboutUsDetail = res.data.data;
            }
          })
      },
      getSystemIntroduction() {
          this.$http.get('systemintro/detail/1', {}).then(res => {
            if(res.data.code == 0) {
              this.systemIntroductionDetail = res.data.data;
            }
          })
      },
		getList() {
			let autoSortUrl = "";
			let data = {}
          autoSortUrl = "shangpinxinxi/autoSort";
          if(localStorage.getItem('frontToken')) {
              autoSortUrl = "shangpinxinxi/autoSort2";
          }
			data = {
				page: 1,
				limit: 6,
			}
			if(this.recommendIndex12shangpinxinxi != 0){
				data.shangpinfenlei = this.recommendList12shangpinxinxi[this.recommendIndex12shangpinxinxi - 1].shangpinfenlei
			}
			this.$http.get(autoSortUrl, {params: data}).then(res => {
				if (res.data.code == 0) {
					this.shangpinxinxiRecommend = res.data.data.list;
					
					
					// 商品列表样式五
					
				}
			});
          autoSortUrl = "aixinjuankuan/autoSort";
			data = {
				page: 1,
				limit: 6,
			}
			this.$http.get(autoSortUrl, {params: data}).then(res => {
				if (res.data.code == 0) {
					this.aixinjuankuanRecommend = res.data.data.list;
					
					
					// 商品列表样式五
					
				}
			});
			
			data = {
				page: 1,
				limit: 6,
			}
			this.$http.get('shangpinxinxi/list', {params: data}).then(res => {
				if (res.data.code == 0) {
					this.shangpinxinxiList = res.data.data.list;
					
					// 商品列表样式五
					
				}
			});
			data = {
				page: 1,
				limit: 6,
			}
			this.$http.get('aixinjuankuan/list', {params: data}).then(res => {
				if (res.data.code == 0) {
					this.aixinjuankuanList = res.data.data.list;
					
					// 商品列表样式五
					
				}
			});
			data = {
				page: 1,
				limit: 6,
			}
			this.$http.get('juankuangongshi/list', {params: data}).then(res => {
				if (res.data.code == 0) {
					this.juankuangongshiList = res.data.data.list;
					
					// 商品列表样式五
					
				}
			});
		},
		toDetail(path, item) {
			this.$router.push({path: '/index/' + path, query: {id: item.id}});
		},
		moreBtn(path) {
			this.$router.push({path: '/index/' + path});
		}
    }
  }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
	.home-preview {
		// -------- search --------
		.search .select /deep/ .el-input__inner {
			border: 0;
			border-radius: 4px;
			padding: 0 30px 0 10px;
			box-shadow: 0 0 6px rgba(64, 158, 255, .3);
			outline: none;
			color: rgba(64, 158, 255, 1);
			width: 180px;
			font-size: 14px;
			height: 44px;
		}
		
		.search .input /deep/ .el-input__inner {
			border: 0;
			border-radius: 4px;
			padding: 0 10px;
			box-shadow: 0 0 6px rgba(64, 158, 255, .3);
			outline: none;
			color: rgba(64, 158, 255, 1);
			width: 180px;
			font-size: 14px;
			height: 44px;
		}
		// -------- search --------
		.recommend {
			.list3 .swiper-button-prev {
				left: 10px;
				right: auto;
			}
			
			.list3 .swiper-button-prev::after {
				color: rgb(64, 158, 255);
			}
			
			.list3 .swiper-button-next {
				left: auto;
				right: 10px;
			}
			
			.list3 .swiper-button-next::after {
				color: rgb(64, 158, 255);
			}
			
			.list5 .swiper-button-prev {
				left: 10px;
				right: auto;
			}
			
			.list5 .swiper-button-prev::after {
				color: rgb(64, 158, 255);
        }
        
        .list5 .swiper-button-next {
				left: auto;
				right: 10px;
			}
			
			.list5 .swiper-button-next::after {
				color: rgb(64, 158, 255);
			}
			
			.list5 {
				.swiper-slide-prev {
					position: relative;
					z-index: 3;
				}
		
				.swiper-slide-next {
					position: relative;
					z-index: 3;
				}
		
				.swiper-slide-active {
					position: relative;
					z-index: 5;
				}
			}
			
			.index-pv1 .animation-box {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
				z-index: initial;
			}
			
			.index-pv1 .animation-box:hover {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 10px, 0px);
				-webkit-perspective: 1000px;
				perspective: 1000px;
				transition: 0.3s;
				z-index: 1;
			}
			
			.index-pv1 .animation-box img {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
			}
			
			.index-pv1 .animation-box img:hover {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
				-webkit-perspective: 1000px;
				perspective: 1000px;
				transition: 0.3s;
			}
		}
		
		.news {
			.list3 .swiper-button-prev {
				left: 10px;
				right: auto;
			}
			
			.list3 .swiper-button-prev::after {
				color: rgb(64, 158, 255);
			}
			
			.list3 .swiper-button-next {
				left: auto;
				right: 10px;
			}
			
			.list3 .swiper-button-next::after {
				color: rgb(64, 158, 255);
			}
			
			.list6 .swiper-button-prev {
				left: 10px;
				right: auto;
			}
			
			.list6 .swiper-button-prev::after {
				color: rgb(64, 158, 255);
			}
			
			.list6 .swiper-button-next {
				left: auto;
				right: 10px;
			}
			
			.list6 .swiper-button-next::after {
				color: rgb(64, 158, 255);
			}
			
			.index-pv1 .animation-box {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
				z-index: initial;
			}
			
			.index-pv1 .animation-box:hover {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 10px, 0px);
				-webkit-perspective: 1000px;
				perspective: 1000px;
				transition: 0.3s;
				z-index: 1;
			}
			
			.index-pv1 .animation-box img {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
			}
			
			.index-pv1 .animation-box img:hover {
				transform: rotate(0deg) scale(1.1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
				-webkit-perspective: 1000px;
				perspective: 1000px;
				transition: 0.3s;
			}
		}
	
		.lists {
			.list3 .swiper-button-prev {
				left: 10px;
				right: auto;
			}
			
			.list3 .swiper-button-prev::after {
				color: rgb(64, 158, 255);
			}
			
			.list3 .swiper-button-next {
				left: auto;
				right: 10px;
        }
        
        .list3 .swiper-button-next::after {
				color: rgb(64, 158, 255);
			}
			
			.list5 .swiper-button-prev {
				left: 10px;
				right: auto;
			}
			
			.list5 .swiper-button-prev::after {
				color: rgb(64, 158, 255);
			}
			
			.list5 .swiper-button-next {
            left: auto;
            right: 10px;
			}
			
			.list5 .swiper-button-next::after {
				color: rgb(64, 158, 255);
			}
			
			.list5 {
				.swiper-slide-prev {
					position: relative;
					z-index: 3;
				}
		
				.swiper-slide-next {
					position: relative;
					z-index: 3;
				}
		
				.swiper-slide-active {
					position: relative;
					z-index: 5;
				}
			}
			
			.index-pv1 .animation-box {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
				z-index: initial;
			}
			
			.index-pv1 .animation-box:hover {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 10px, 0px);
				-webkit-perspective: 1000px;
				perspective: 1000px;
				transition: 0.3s;
				z-index: 1;
			}
			
			.index-pv1 .animation-box img {
				transform: rotate(0deg) scale(1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
			}
			
			.index-pv1 .animation-box img:hover {
				transform: rotate(0deg) scale(1.1) skew(0deg, 0deg) translate3d(0px, 0px, 0px);
				-webkit-perspective: 1000px;
				perspective: 1000px;
				transition: 0.3s;
			}
		}
	}
	





	.home-preview .news .list19 .left .item .title {
				padding: 5px 10px;
				overflow: hidden;
				color: #333;
				font-size: 14px;
				line-height: 30px;
				height: 30px;
			}
	
	.home-preview .news .list19 .left .item .title:hover {
				color: #000;
			}
	
	.home-preview .news .list19 .right .item .dian {
				border-radius: 100%;
				margin: 0 6px;
				background: #654b3c;
				width: 6px;
				height: 6px;
			}
	.home-preview .news .list19 .right .item:hover .dian {
				background: #654b3c;
			}
	
	.home-preview .news .list19 .right .item .title {
				overflow: hidden;
				color: #333;
				flex: 1;
				font-size: 14px;
				line-height: 45px;
				transition: 0.3s;
				height: 45px;
			}
	.home-preview .news .list19 .right .item:hover .title {
				color: #654b3c;
			}
	
	.home-preview .news .list19 .right .item .time .icon {
				color: #666;
				font-size: 12px;
				line-height: 32px;
			}
	.home-preview .news .list19 .right .item:hover .time .icon {
				color: #654b3c;
			}
	
	.home-preview .news .list19 .right .item .time .text {
				color: #666;
				font-size: 12px;
				line-height: 32px;
			}
	.home-preview .news .list19 .right .item:hover .time .text {
				color: #654b3c;
			}


	.home-preview .recommend .list12 .tab .item {
				cursor: pointer;
				border: 0;
				margin: 0 10px;
				background-size: 100% 100%;
				color: #654B3C;
				display: flex;
				font-size: 16px;
				flex-direction: column;
				background: url(http://codegen.caihongy.cn/20231114/7fb39082b8fa4b8b95898208654dbc13.png);
				width: 90px;
				justify-content: center;
				align-items: center;
				height: 90px;
			}
	
	.home-preview .recommend .list12 .tab .item:hover {
				color: #654B3C;
			}
	
	.home-preview .recommend .list12 .tab .item.active {
				color: #654B3C;
				border-color: #654B3C;
				border-width: 0 0 2px 0;
				border-style: solid;
			}
	
	.home-preview .recommend .list12 .tab .more {
				cursor: pointer;
				border: 1px solid #DFDFDF;
				padding: 0 20px;
				margin: 0 10px;
				color: #654B3C;
				display: flex;
				width: 90px;
				justify-content: center;
				align-items: center;
				text-align: center;
				height: 90px;
			}
	
	.home-preview .recommend .list12 .tab .more:hover {
				color: #654B3C;
			}
	
	.home-preview .recommend .list12 .item.active {
	  animation-name: mymove;
	
	  &:nth-of-type(1) {
	    animation-duration: 1s;
	  }
	  &:nth-of-type(2) {
	    animation-duration: 1.2s;
	  }
	  &:nth-of-type(3) {
	    animation-duration: 1.4s;
	  }
	  &:nth-of-type(4) {
	    animation-duration: 1.6s;
	  }
	  &:nth-of-type(5) {
	    animation-duration: 1.8s;
	  }
	  &:nth-of-type(6) {
	    animation-duration: 2s;
	  }
	}
	
	@keyframes mymove
	{
		from {top: 320px;}
		to {top: 0;}
	}



	.home-preview .lists .list15 .left .box1 .info {
				left: 0;
				background: rgba(0,0,0,.3);
				bottom: 0;
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				position: absolute;
				opacity: 0;
				transition: all .3s;
				height: 100%;
			}
	
	.home-preview .lists .list15 .left .box1 .info:hover {
				opacity: 1;
			}
	
	.home-preview .lists .list15 .left .box2 .info {
				left: 0;
				background: rgba(0,0,0,.3);
				bottom: 0;
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				position: absolute;
				opacity: 0;
				transition: all .3s;
				height: 100%;
			}
	
	.home-preview .lists .list15 .left .box2 .info:hover {
				opacity: 1;
			}
	
	.home-preview .lists .list15 .center .box1 .info {
				left: 0;
				background: rgba(0,0,0,.3);
				bottom: 0;
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				position: absolute;
				opacity: 0;
				transition: all .3s;
				height: 100%;
			}
	
	.home-preview .lists .list15 .center .box1 .info:hover {
				opacity: 1;
			}
	
	.home-preview .lists .list15 .center .box3 .info {
				left: 0;
				background: rgba(0,0,0,.3);
				bottom: 0;
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				position: absolute;
				opacity: 0;
				transition: all .3s;
				height: 100%;
			}
	
	.home-preview .lists .list15 .center .box3 .info:hover {
				opacity: 1;
			}
	
	.home-preview .lists .list15 .right .box1 .info {
				left: 0;
				background: rgba(0,0,0,.3);
				bottom: 0;
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				position: absolute;
				opacity: 0;
				transition: all .3s;
				height: 100%;
			}
	
	.home-preview .lists .list15 .right .box1 .info:hover {
				opacity: 1;
			}
	
	.home-preview .lists .list15 .right .box2 .info {
				left: 0;
				background: rgba(0,0,0,.3);
				bottom: 0;
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				position: absolute;
				opacity: 0;
				transition: all .3s;
				height: 100%;
			}
	
	.home-preview .lists .list15 .right .box2 .info:hover {
				opacity: 1;
			}
</style>
