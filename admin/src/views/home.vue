<template>
<div class="content" :style='{"minHeight":"100vh","padding":"40px 30px 20px","alignItems":"flex-start","flexWrap":"wrap","background":"url(http://codegen.caihongy.cn/20231104/93c9cca5595b4e21bb2a11e440cdca8d.png) no-repeat center top / cover,#f6f6f6","display":"flex","fontSize":"14px","height":"100%"}'>
	<!-- notice -->
	<!-- title -->
	<div class="text" :style='{"margin":"30px auto 40px","color":"rgb(51, 51, 51)","textAlign":"center","display":"none","width":"100%","fontSize":"22px","fontWeight":"500"}'>欢迎使用 {{this.$project.projectName}}</div>
	

	<!-- 日历 -->
	<div class="calendar" :style='{"border":"1px solid #eee","boxShadow":"0 0px 0px rgba(0,0,0,.1)","margin":"0px auto 20px","borderRadius":"0px","color":"#666","background":"none","width":"calc(100% - 230px)","fontSize":"inherit","height":"auto","order":"1"}'>
	  <div :style='{"padding":"30px 30px 0","borderColor":"rgba(126, 96, 16, .1)","color":"#333","flexWrap":"wrap","background":"#fff","borderWidth":"0 0 0px","display":"flex","width":"100%","borderStyle":"solid","justifyContent":"space-between","height":"auto"}'>
	    <div @click="pyear" :style='{"cursor":"pointer","border":"0px solid #999","padding":"0 12px 0 0","alignItems":"center","color":"inherit","borderRadius":"4px","background":"rgba(255,255,255,.0)","display":"flex","width":"auto","fontSize":"inherit","justifyContent":"center","height":"auto"}'><span class="icon iconfont icon-jiantou33" :style='{"margin":"0 2px","fontSize":"inherit","color":"inherit","display":"none"}'></span>上一年</div>
	    <div @click="pmonth" :style='{"cursor":"pointer","border":"0px solid #999","padding":"0 12px 0 0","alignItems":"center","color":"inherit","borderRadius":"4px","background":"rgba(86,178,198,.0)","display":"flex","width":"auto","fontSize":"inherit","justifyContent":"center","height":"auto"}'><span class="icon iconfont icon-jiantou33" :style='{"margin":"0 2px","fontSize":"inherit","color":"inherit","display":"none"}'></span>上一月</div>
	    <div :style='{"padding":"0 10px","fontSize":"16px","alignItems":"center","justifyContent":"center","display":"flex"}'>
	      <div :style='{"color":"inherit","margin":"0 2px","fontSize":"inherit"}'>{{this.year}}年</div>
	      <div :style='{"color":"inherit","margin":"0 2px","fontSize":"inherit"}'>{{this.month}}月</div>
	    </div>
	    <div @click="nmonth" :style='{"cursor":"pointer","border":"0px solid #999","padding":"0 0 0 12px","alignItems":"center","color":"inherit","borderRadius":"4px","background":"rgba(86,178,198,.0)","display":"flex","width":"auto","fontSize":"inherit","justifyContent":"center","height":"auto"}'>下一月<span class="icon iconfont icon-jiantou34" :style='{"margin":"0 2px","fontSize":"inherit","color":"inherit","display":"none"}'></span></div>
	    <div @click="nyear" :style='{"cursor":"pointer","border":"0px solid #999","padding":"0 0 0 12px","alignItems":"center","color":"inherit","borderRadius":"4px","background":"rgba(86,178,198,.0)","display":"flex","width":"auto","fontSize":"inherit","justifyContent":"center","height":"auto"}'>下一年<span class="icon iconfont icon-jiantou34" :style='{"margin":"0 2px","fontSize":"inherit","color":"inherit","display":"none"}'></span></div>
	  </div>
	  <table :style='{"border":"0px solid #eee","width":"100%","padding":"0 0 20px","borderRadius":"0px","background":"rgba(255, 255, 255, .96)","height":"auto"}' v-if="this.weeks.length">
	    <thead :style='{"width":"100%","height":"auto"}'>
	      <tr :style='{"width":"100%","padding":"0 30px","alignItems":"center","justifyContent":"space-between","display":"flex"}'>
	        <th :style='{"lineHeight":"54px","fontSize":"inherit","alignItems":"center","color":"#999","justifyContent":"center","display":"flex"}' v-for="item,index in this.heads" :key="index">{{item}}</th>
	      </tr>
	    </thead>
	    <tbody :style='{"width":"100%"}'>
	      <tr :style='{"width":"100%","alignItems":"center","justifyContent":"center","display":"flex"}' v-for="week,index in this.weeks" :key="index">
	        <td :style='{"cursor":"pointer","padding":"10px 12px 10px","flex":1,"display":"flex","height":"auto"}' v-for="day,key in week.days" :key="key" :class="{other: day.isOther, festival: day.isFestival, today: day.isToday, rest: day.isRest}">
	          <div class="text">
	            <div class="new">{{day.day}}</div>
	            <div class="old">{{day.text}}</div>
	          </div>
	        </td>
	      </tr>
	    </tbody>
	  </table>
	</div>
	
	<!-- echarts -->
</div>
</template>
<script>
//0
import router from '@/router/router-static'
import * as echarts from 'echarts'
export default {
	data() {
		return {
			// 日历
			year: 2023,
			month: 6,
			heads: ['一', '二', '三', '四', '五', '六', '日'],
			weeks: [],
			now: Solar.fromDate(new Date()),
		};
	},
	mounted(){
		this.init();
	},
	methods:{
		init(){
			if(this.$storage.get('Token')){
			this.$http({
				url: `${this.$storage.get('sessionTable')}/session`,
				method: "get"
			}).then(({ data }) => {
				if (data && data.code != 0) {
				router.push({ name: 'login' })
				}
			});
			}else{
				router.push({ name: 'login' })
			}
			this.$nextTick(() => {
				// --- 日历 ---
				this.year = this.now.getYear()
				this.month = this.now.getMonth()
				this.weeks = this.render(this.year, this.month);
			})
		},
		// 日历
		nyear() {
			this.year = this.year + 1
			this.weeks = this.render(this.year, this.month)
		},
		pyear() {
			this.year = this.year - 1
			this.weeks = this.render(this.year, this.month)
		},
		nmonth() {
			this.month = this.month + 1
			if (this.month > 12) {
				this.month = 1
				this.year = this.year + 1
			}
			this.weeks = this.render(this.year, this.month)
		},
		pmonth() {
			this.month = this.month - 1
			if (this.month < 1) {
				this.month = 12
				this.year = this.year - 1
			}
			this.weeks = this.render(this.year, this.month)
		},
		// 日历
		render(year, month, weekStart = 1) {
			let months = SolarMonth.fromYm(year, month)
			let weeks = []
		
			months.getWeeks(weekStart).forEach(w => {
				let week = {
					index: 0,
					days: []
				}
				week.index = w.getIndexInYear()
				let days = []
				w.getDays().forEach(d => {
					days.push(this.buildDay(d, month))
				})
				week.days = days
				weeks.push(week)
			})
			return weeks
		},
		buildDay(d, month) {
			let lunar = d.getLunar()
			let day = {
				day: 0,
				text: '',
				isFestival: false,
				isToday: false,
				isOther: false,
				isHoliday: false,
				isRest: false
			}
			day.day = d.getDay()
			let text = lunar.getDayInChinese()
			if (1 === d.getDay()) {
				text = lunar.getMonthInChinese() + '月'
			}
			// let otherFestivals = d.getOtherFestivals()
			// if (otherFestivals.length > 0) {
			// 	text = otherFestivals[0]
			// 	day.isFestival = true
			// }
			// otherFestivals = lunar.getOtherFestivals()
			// if (otherFestivals.length > 0) {
			// 	text = otherFestivals[0]
			// 	day.isFestival = true
			// }
			let festivals = d.getFestivals()
			if (festivals.length > 0) {
				text = festivals[0]
				day.isFestival = true
			}
			festivals = lunar.getFestivals()
			if (festivals.length > 0) {
				text = festivals[0]
				day.isFestival = true
			}
			let jq = lunar.getJieQi()
			if (jq) {
				text = jq
				day.isFestival = true
			}
			day.text = text
			if (d.toYmd() === this.now.toYmd()) {
				day.isToday = true
			}
			if (d.getMonth() !== month) {
				day.isOther = true
			}
			let h = HolidayUtil.getHoliday(d.getYear(), d.getMonth(), d.getDay())
			if (h) {
				day.isHoliday = true
				day.isRest = !h.isWork()
			}
			return day
		},
		// 日历
  }
};
</script>
<style lang="scss" scoped>
    .cardView {
        display: flex;
        flex-wrap: wrap;
        width: 100%;

        .cards {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 10px;
            justify-content: center;
            .card {
                width: calc(25% - 20px);
                margin: 0 10px;
                /deep/.el-card__body{
                    padding: 0;
                }
            }
        }
    }
	
	// 日历
	.calendar td .text {
				border: 1px solid #f6f6f6;
				border-radius: 0px;
				flex-direction: column;
				color: #999;
				background: rgba(255, 255, 255, .0);
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				height: 100%;
			}
	.calendar td .text:hover {
				background: none;
			}
	.calendar td .text .new {
				color: inherit;
				font-size: inherit;
				line-height: 1.4;
			}
	.calendar td .text .old {
				color: inherit;
				font-size: inherit;
				line-height: 1.4;
			}
	.calendar td.festival .text {
				border: 1px solid rgba(88, 156, 246, .1);
				border-radius: 0px;
				flex-direction: column;
				color: rgba(88, 156, 246, 1);
				background: rgba(88, 156, 246, .03);
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				height: 100%;
			}
	.calendar td.festival .text:hover {
				background: rgba(88, 156, 246, .03);
			}
	.calendar td.festival .text .new {
				color: inherit;
				font-size: inherit;
				line-height: 1.4;
			}
	.calendar td.festival .text .old {
				color: inherit;
				font-size: inherit;
				line-height: 1.4;
			}
	.calendar td.other .text {
				border-radius: 0px;
				flex-direction: column;
				background: none;
				display: flex;
				width: 100%;
				font-size: inherit;
				justify-content: center;
				align-items: center;
				opacity: 0.6;
				height: 100%;
			}
	.calendar td.other .text:hover {
				background: none;
			}
	.calendar td.other .text .new {
				color: #000;
				font-size: inherit;
				line-height: 1.4;
			}
	.calendar td.other .text .old {
				color: #666;
				font-size: inherit;
				line-height: 1.4;
			}
	.calendar td.today .text {
				border-radius: 0px;
				flex-direction: column;
				color: #fff;
				background: rgba(88, 156, 246, 1);
				display: flex;
				width: 100%;
				justify-content: center;
				align-items: center;
				height: 100%;
			}
	.calendar td.today .text:hover {
				background: rgba(88, 156, 246, 1);
			}
	.calendar td.today .text .new {
				font-size: inherit;
				line-height: 1.4;
			}
	.calendar td.today .text .old {
				font-size: inherit;
				line-height: 1.4;
			}
	
	// echarts1
	.type1 .echarts1 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0px 0;
				background: rgba(255,255,255,.96);
				width: 100%;
				position: relative;
				transition: 0.3s;
				height: 100%;
			}
	.type1 .echarts1:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	// echarts2
	.type2 .echarts1 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 100%;
			}
	.type2 .echarts1:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type2 .echarts2 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 100%;
			}
	.type2 .echarts2:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	// echarts3
	.type3 .echarts1 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0 0 30px;
				color: #333;
				background: rgba(255,255,255,.96);
				width: 100%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type3 .echarts1:hover {
				box-shadow: 0px 0px 0px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type3 .echarts2 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0 0 30px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type3 .echarts2:hover {
				box-shadow: 0px 0px 0px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type3 .echarts3 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type3 .echarts3:hover {
				box-shadow: 0px 0px 0px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	// echarts4
	.type4 .echarts1 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0px 0 30px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type4 .echarts1:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type4 .echarts2 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0px 0 30px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type4 .echarts2:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type4 .echarts3 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0px 0 10px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type4 .echarts3:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type4 .echarts4 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0px 0 10px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type4 .echarts4:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	// echarts5
	.type5 .echarts1 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0px 0 10px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type5 .echarts1:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type5 .echarts2 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 0px 0 10px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type5 .echarts2:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type5 .echarts3 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 10px 0 10px;
				background: rgba(255,255,255,.96);
				width: 100%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type5 .echarts3:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type5 .echarts4 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 10px 0 10px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type5 .echarts4:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	.type5 .echarts5 {
				border: 1px solid #eee;
				border-radius: 0px;
				padding: 10px;
				margin: 10px 0 10px;
				background: rgba(255,255,255,.96);
				width: 49%;
				position: relative;
				transition: 0.3s;
				height: 360px;
			}
	.type5 .echarts5:hover {
				box-shadow: 1px 1px 20px rgba(255,255,255,.12);
				transform: translate3d(0, 0px, 0);
				z-index: 1;
			}
	
	.echarts-flag-2 {
	  display: flex;
	  flex-wrap: wrap;
	  justify-content: space-between;
	  padding: 10px 20px;
	  background: rebeccapurple;
	
	  &>div {
	    width: 32%;
	    height: 300px;
	    margin: 10px 0;
	    background: rgba(255,255,255,.1);
	    border-radius: 8px;
	    padding: 10px 20px;
	  }
	}
</style>
