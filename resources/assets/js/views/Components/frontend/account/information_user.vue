<template>
	<div v-bind:class="{ active: isActive }" class="loading">
		<div class="container main-container headerOffset">
		    <div class="row">
		        <div class="breadcrumbDiv col-lg-12">
		            <ul class="breadcrumb">
		                <li><a href="">Home</a></li>
		                <li><a href="">My Account</a></li>
		                <li class="active"> My information</li>
		            </ul>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-lg-9 col-md-9 col-sm-7">
		            <h1 class="section-title-inner"><span><i
		                    class="glyphicon glyphicon-user"></i> My personal information </span></h1>
		            <div class="row userInfo">
		                <div class="col-lg-12">
		                    <h2 class="block-title-2"> Please be sure to update your personal information if it has
		                        changed. </h2>
							<p class="error" v-if="errors.length">
								<b>Please correct the following error(s):</b>
								<ul>
									<li v-for="error in errors">{{ error }}</li>
								</ul>
							</p>
							<span class="success" value='true' v-if="flash.success">
								<i class="fa fa-wa fa-check"></i> {{flash.success}}
							</span>
							<v-alert class="danger" value='true' v-if="flash.error">
								{{ flash.error }}
							</v-alert>
		                </div>
		                <form ref="form" @submit.prevent="submit">
		                    <div class="col-xs-12 col-sm-6">
								<input type="hidden" v-model="customer_info.customer_id" class="form-control" id="InputName">
		                        <div class="form-group required">
		                            <label for="InputName">First Name <sup>*</sup> </label>
		                            <input type="text" v-model="customer_info.firstname" class="form-control" id="InputName" placeholder="First Name">
		                        </div>
		                        <div class="form-group required">
		                            <label for="InputLastName">Last Name <sup>*</sup> </label>
		                            <input type="text" v-model="customer_info.lastname" class="form-control" id="InputLastName" placeholder="Last Name">
		                        </div>
		                        <div class="form-group">
		                            <label for="InputEmail"> Email </label>
		                            <input type="email" v-model="customer_info.email" class="form-control" id="InputEmail" placeholder="gtanim@gmail.com">
		                        </div>
		                        <div class="form-group">
		                            <label>Date of Birth</label>

		                            <div class="row">
		                                <div class="col-xs-4">
		                                    <select class="form-control" id="days" name="days">
		                                        <option>-</option>
		                                        <option value="1">1&nbsp;&nbsp;</option>
		                                        <option value="2">2&nbsp;&nbsp;</option>
		                                        <option value="3">3&nbsp;&nbsp;</option>
		                                        <option value="4">4&nbsp;&nbsp;</option>
		                                        <option value="5">5&nbsp;&nbsp;</option>
		                                        <option value="6">6&nbsp;&nbsp;</option>
		                                        <option value="7">7&nbsp;&nbsp;</option>
		                                        <option value="8">8&nbsp;&nbsp;</option>
		                                        <option value="9">9&nbsp;&nbsp;</option>
		                                        <option value="10">10&nbsp;&nbsp;</option>
		                                        <option value="11">11&nbsp;&nbsp;</option>
		                                        <option value="12">12&nbsp;&nbsp;</option>
		                                        <option value="13">13&nbsp;&nbsp;</option>
		                                        <option value="14">14&nbsp;&nbsp;</option>
		                                        <option value="15">15&nbsp;&nbsp;</option>
		                                        <option selected="selected" value="16">16&nbsp;&nbsp;</option>
		                                        <option value="17">17&nbsp;&nbsp;</option>
		                                        <option value="18">18&nbsp;&nbsp;</option>
		                                        <option value="19">19&nbsp;&nbsp;</option>
		                                        <option value="20">20&nbsp;&nbsp;</option>
		                                        <option value="21">21&nbsp;&nbsp;</option>
		                                        <option value="22">22&nbsp;&nbsp;</option>
		                                        <option value="23">23&nbsp;&nbsp;</option>
		                                        <option value="24">24&nbsp;&nbsp;</option>
		                                        <option value="25">25&nbsp;&nbsp;</option>
		                                        <option value="26">26&nbsp;&nbsp;</option>
		                                        <option value="27">27&nbsp;&nbsp;</option>
		                                        <option value="28">28&nbsp;&nbsp;</option>
		                                        <option value="29">29&nbsp;&nbsp;</option>
		                                        <option value="30">30&nbsp;&nbsp;</option>
		                                        <option value="31">31&nbsp;&nbsp;</option>
		                                    </select>
		                                </div>
		                                <div class="col-xs-4">
		                                    <select class="form-control" name="months" id="months">
		                                        <option>-</option>
		                                        <option value="1">January&nbsp;</option>
		                                        <option value="2">February&nbsp;</option>
		                                        <option value="3">March&nbsp;</option>
		                                        <option value="4">April&nbsp;</option>
		                                        <option value="5">May&nbsp;</option>
		                                        <option value="6">June&nbsp;</option>
		                                        <option value="7">July&nbsp;</option>
		                                        <option value="8">August&nbsp;</option>
		                                        <option value="9">September&nbsp;</option>
		                                        <option value="10">October&nbsp;</option>
		                                        <option value="11">November&nbsp;</option>
		                                        <option selected="selected" value="12">December&nbsp;</option>
		                                    </select>
		                                </div>
		                                <div class="col-xs-4">
		                                    <select class="form-control" name="years" id="years">
		                                        <option>-</option>
		                                        <option value="2014">2014&nbsp;&nbsp;</option>
		                                    </select>
		                                </div>
		                            </div>
		                        </div>
								<div class="form-group">
		                            <label for="InputEmail"> Post Code </label>
		                            <input type="text" v-model="customer_info.postcode" firstname class="form-control"/>
		                        </div>
								<div class="form-group">
		                            <label for="InputEmail"> City </label>
		                            <input type="text" class="form-control" v-model="customer_info.city"/>
		                        </div>
								<div class="form-group">
		                            <label for="InputEmail"> Address </label>
		                            <textarea class="form-control">{{ customer_info.address_1 }}</textarea>
		                        </div>
		                    </div>
							
		                    <div class="col-xs-12 col-sm-6">
		                        <div class="form-group required">
		                            <label for="InputPasswordCurrent"> Password <sup> * </sup> </label>
		                            <input type="password" value="123456" name="InputPasswordCurrent" class="form-control"
		                                   id="InputPasswordCurrent">
		                        </div>
		                        <div class="form-group required">
		                            <label for="InputPasswordnew"> New Password </label>
		                            <input type="password" name="InputPasswordnew" class="form-control" id="InputPasswordnew">
		                        </div>
		                        <div class="form-group required">
		                            <label for="InputPasswordnewConfirm"> Confirm Password </label>
		                            <input type="password" name="InputPasswordnewConfirm" class="form-control"
		                                   id="InputPasswordnewConfirm">
		                        </div>
		                    </div>
		                    <!--<div class="col-lg-12">
		                        <div class="form-group ">
		                            <p class=" clearfix">
		                                <input type="checkbox" value="1" name="newsletter" id="newsletter">
		                                <label for="newsletter">Sign up for our newsletter!</label>
		                            </p>

		                            <p class="clearfix">
		                                <input type="checkbox" value="1" id="optin" name="optin">
		                                <label for="optin">Receive special offers from our partners!</label>
		                            </p>
		                        </div>
		                    </div>-->
		                    <div class="col-lg-12">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save</button>
		                    </div>
		                </form>
		                <div class="col-lg-12 clearfix">
		                    <ul class="pager">
		                        <li class="previous pull-right">
		                        	<router-link v-bind:to="'/'" title="Orders">
		                               <i class="fa fa-home"></i> Go to Shop
		                            </router-link>
		                        </li>
		                        <li class="next pull-left">
		                        	 <router-link v-bind:to="'/account/dashboard'" title="Orders">
                                    	← Back to My account
                            		</router-link>
		                        </li>
		                    </ul>
		                </div>
		            </div>
		            <!--/row end-->

		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-5"></div>
		    </div>
		    <!--/row-->

		    <div style="clear:both"></div>
		</div>
		<!-- /main-container -->

		<div class="gap"></div>
	</div>
</template>

<style>
	.error{
		padding: 10px;
	}
	p.error ul li{
		font-weight: bold;
		color: #f00;
	}
</style>

<script type="text/javascript">

  import axios from 'axios'
  import Flash from '../../../../helper/flash'
  import VueTranslate from 'vue-translate-plugin'
  import Vue from 'vue';
  Vue.use(VueTranslate);
  
  export default{
    data(){
      return{
      	isActive: true,
        loaded: false,
		success: false,
        response: null,
		customer_id: 0,
		errors: [],
		flash: Flash.state,
        error: Flash.state,
		customer_info:{
			firstname:'',
			lastname:'',
			email:'',
			telephone:'',
			fax:'',
			city:'',
			code:'',
		}
      }
    },
    created() {
        this.CustomerInfo()
    },

    methods: {
		submit () {
			this.errors = [];
			window.scrollTo(100,0)
			if (!this.customer_info.firstname) {
				this.errors.push("First Name required.");
			}
			if (!this.customer_info.lastname) {
				this.errors.push("First Name required.");
			}
			if (!this.customer_info.email) {
				this.errors.push('Email required.');
			} else if (!this.validEmail(this.customer_info.email)) {
				this.errors.push('Valid email required.');
			}

			if (!this.errors.length) {
				axios.put('/api/customer/' + this.customer_id, {
					firstname: this.customer_info.firstname,
					lastname: this.customer_info.lastname,
					email: this.customer_info.email,
					telephone: this.customer_info.telephone,
					fax: this.customer_info.fax,
					code: this.customer_info.postcode,
					city: this.customer_info.city
				}).then((res)=>{
					if(res.data.success){
						Flash.setSuccess(res.data.message)
					}else{
						Flash.setError(res.data.message)
					}
				}).catch((err) => {
					if(err.response.status === 401) {
						this.error = err.response.data
					}
					Flash.setError('Error while trying to update!')
				})
				
				return true;
			}
		},
		validEmail(email) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		},
        CustomerInfo() {
            axios.get(`/api/customer_info`)
	        .then(response => {
	            this.customer_info = response['data']['data']
				this.customer_id = this.customer_info.customer_id;
	            this.isActive = !this.isActive
	        })
	        .catch(e => {
	          this.errors.push(e)
	        })
        }
    },
    render() {
        
    },
    locales: {
        en: {
            'entry_personal_information': 'My personal information',
            'entry_text_update_information': 'Please be sure to update your personal information if it has​​​​ changed.',
            'entry_require_field': 'Required Field'
        },
        kh: {
            'entry_personal_information': 'ពត៌មានផ្ទាល់ខ្លួន',
            'entry_text_update_information': 'Please be sure to update your personal information if it has​​​​ changed.',
            'entry_require_field': 'Required Field'
        }
    },
    mounted: function(){
        // return this.$scopedSlots.default({
        //   response: this.response.data['data']
        // })
    }
  }
</script>