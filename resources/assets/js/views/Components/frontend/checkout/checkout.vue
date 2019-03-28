<template>
	<div>
		<div class="container main-container headerOffset">
		    <div class="row">
		        <div class="breadcrumbDiv col-lg-12">
		            <ul class="breadcrumb">
		                <li><a href="">Home</a></li>
		                <li><a href="">Cart</a></li>
		                <li class="active"> Checkout</li>
		            </ul>
		        </div>
		    </div>
		    <!--/.row-->

		    <div class="row">
		        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
		            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Checkout</span></h1>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
		            <h4 class="caps"><router-link v-bind:to="'/'"><i class="fa fa-chevron-left"></i> Back to shopping </router-link></h4>
		        </div>
		    </div>
		    <!--/.row-->
		    
		    <div class="row">
		        <div class="col-lg-9 col-md-9 col-sm-12">
		            <div class="row userInfo">
		                <div class="col-xs-12 col-sm-12">
		                    <div class="w100 clearfix">
								<ul class="orderStep orderStepLook2">
									<li :class="{'active': activeTab == '1' }"><a href="javascript:void(0);"> <i class="fa fa-map-marker "></i> <span> address</span>
									</a></li>
									<li :class="{'active': activeTab == '2' }"><a href="javascript:void(0);"> <i class="fa fa fa-envelope  "></i>
										<span> Billing </span></a></li>
									<li :class="{'active': activeTab == '3' }"><a href="javascript:void(0);"><i class="fa fa-truck"> </i><span>Shipping</span> </a></li>
									<li :class="{'active': activeTab == '4' }"><a href="javascript:void(0);"><i class="fa fa-money"> </i><span>Payment</span> </a></li>
									<li :class="{'active': activeTab == '5' }"><a href="javascript:void(0);"><i class="fa fa-check-square"> </i><span>Order</span></a>
									</li>
								</ul>
								<!--/.orderStep end-->
							 </div>
		                   <div>
		                   <!-- Customer address -->
							<div class="w100 clearfix" v-show='showStep1'>
								<div class="row userInfo">
									<div class="col-lg-12">
										<h2 class="block-title-2"> To add a new address, please fill out the form below. </h2>
									</div>
									<div class="col-xs-12">
										<p class="error" v-if="errors.length">
											<b>Please correct the following error(s):</b>
											<ul>
												<li v-for="error in errors">{{ error }}</li>
											</ul>
										</p>
									</div>
									<form>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group required">
												<label for="InputName">First Name <sup>*</sup> </label>
												<input required v-model="data.firstname" type="text" class="form-control" id="InputName" placeholder="First Name">
											</div>
											<div class="form-group required">
												<label for="InputLastName">Last Name <sup>*</sup> </label>
												<input required v-model="data.lastname" type="text" class="form-control" id="InputLastName"
													placeholder="Last Name">
											</div>
											<div class="form-group required">
												<label for="InputLastName">Company <sup>*</sup> </label>
												<input required v-model="data.payment_company" type="text" class="form-control" id="InputLastName"
													placeholder="Last Name">
											</div>
											<div class="form-group required">
												<label for="InputEmail">Email <sup>*</sup></label>
												<input required type="email" v-model="data.email" class="form-control" id="InputEmail" placeholder="Email">
											</div>
											<div class="form-group required">
												<label for="InputAddress">Address <sup>*</sup> </label>
												<input required v-model="data.payment_address_1" type="text" class="form-control" id="InputAddress"
													placeholder="Address">
											</div>
											<div class="form-group">
												<label for="InputAddress2">Address (Line 2) </label>
												<input type="text" v-model="data.payment_address_2" class="form-control" id="InputAddress2"
													placeholder="Address">
											</div>
											<div class="form-group required">
												<label for="InputCity">City <sup>*</sup> </label>
												<input required v-model="data.payment_city" type="text" class="form-control" id="InputCity"
													placeholder="City">
											</div>
											<div class="form-group required">
												<label for="InputState">Zone <sup>*</sup> </label>

												<select class="form-control" required v-model="data.payment_zone" aria-required="true" id="InputState"
														name="InputState">
													<option value="50">Wyoming</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group required">
												<label for="InputZip">Zip / Postal Code <sup>*</sup> </label>
												<input required v-model="data.payment_postcode" type="text" class="form-control" id="InputZip"
													placeholder="Zip / Postal Code">
											</div>
											<div class="form-group required">
												<label for="InputCountry">Country <sup>*</sup> </label>
												<select class="form-control" required v-model="data.payment_country" aria-required="true" id="InputCountry"
														name="InputCountry">
													
													<option value="21">United States</option>
												</select>
											</div>
											<div class="form-group">
												<label for="InputAdditionalInformation">Additional information</label>
												<textarea rows="3" v-model="data.comment"  cols="26" name="InputAdditionalInformation"
														class="form-control" id="InputAdditionalInformation"></textarea>
											</div>
											<div class="form-group required">
												<label for="InputMobile">Mobile phone <sup>*</sup></label>
												<input required v-model="data.telephone" type="tel" name="InputMobile" class="form-control"
													id="InputMobile">
											</div>
										</div>
									</form>
									<div class="cartFooter w100">
										<div class="box-footer">
											<div class="pull-left"><router-link class="btn btn-default" to="/"> <i
													class="fa fa-arrow-left"></i> &nbsp; Back to Shop </router-link></div>
											<div class="pull-right"><a class="btn btn-primary btn-small" @click="shippingAddress();">Shipping address &nbsp; <i class="fa fa-arrow-circle-right"></i> </a></div>
										</div>
									</div>
								</div>
								<!--/row end-->

							</div>

		                    <!-- Billing address -->
		                    <div class="w100 clearfix" v-show='showStep2'>
								<div class="row userInfo">
									<div class="col-lg-12">
										<h2 class="block-title-2"> To add a billing address, please fill out the form
											below. </h2>
									</div>
									<div class="col-xs-12 col-sm-12">
										<label class="checkbox-inline" for="checkboxes-0">
											<input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
											My delivery and billing addresses are the same. </label>
										<hr>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group required">
											<label for="InputName">First Name <sup>*</sup> </label>
											<input required v-model="data.shipping_firstname" type="text" class="form-control" id="InputName"
												placeholder="First Name">
										</div>
										<div class="form-group required">
											<label for="InputLastName">Last Name <sup>*</sup> </label>
											<input required v-model="data.shipping_lastname" type="text" class="form-control" id="InputLastName"
												placeholder="Last Name">
										</div>
										<div class="form-group required">
											<label for="InputLastName">Shipping Company <sup>*</sup> </label>
											<input required v-model="data.shipping_company" type="text" class="form-control" id="InputLastName"
												placeholder="Last Name">
										</div>
										<div class="form-group required">
											<label for="InputAddress">Shipping Address <sup>*</sup> </label>
											<input required v-model="data.shipping_address_1" type="text" class="form-control" id="InputAddress"
												placeholder="Address">
										</div>
										<div class="form-group">
											<label for="InputAddress2">Shipping Address (Line 2) </label>
											<input type="text" v-model="data.shipping_address_2" class="form-control" id="InputAddress2" placeholder="Address">
										</div>
										<div class="form-group required">
											<label for="InputCity">Shippiing City <sup>*</sup> </label>
											<input required type="text" v-model="data.shipping_city" class="form-control" id="InputCity" placeholder="City">
										</div>
										<div class="form-group required">
											<label for="InputState">Shipping Zone <sup>*</sup> </label>
											<select class="form-control" v-model="data.shipping_zone" required aria-required="true" id="InputState"
													name="InputState">
												<option value="">Choose</option>
												<option value="1">Alabama</option>
												
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group required">
											<label for="InputZip">Shipping Zip / Postal Code <sup>*</sup> </label>
											<input required v-model="data.shipping_code" type="text" class="form-control" id="InputZip"
												placeholder="Zip / Postal Code">
										</div>
										<div class="form-group required">
											<label for="InputCountry">Country <sup>*</sup> </label>
											<select class="form-control" required v-model="data.shipping_country" aria-required="true" id="InputCountry"
													name="InputCountry">
												
												<option value="17">United Kingdom</option>
												<option selected="selected" value="21">United States</option>
											</select>
										</div>
									</div>

									<div class="cartFooter w100">
										<div class="box-footer">

											<div class="pull-left">
												<a class="btn btn-default" href="javascript:void(0);" @click="showStep1 = true; showStep2 = false; activeTab = 1;"> <i class="fa fa-arrow-left"></i>
													&nbsp; Shipping address </a></div>
											<div class="pull-right">
												<a @click="shippingMethod()" class="btn btn-primary btn-small "> Shipping method &nbsp; <i
														class="fa fa-arrow-circle-right"></i> </a></div>
										</div>
									</div>

								</div>
								<!--/row end-->

							</div>
		                    
		                    <!-- Shipping address -->
		                     
		                    <div class="w100 clearfix" v-show='showStep3'>
								<div class="row userInfo">
									<div class="col-lg-12">
										<h2 class="block-title-2"> Choose your delivery method </h2>
									</div>
									<div class="col-xs-12 col-sm-12">
										<div class="w100 row">
											<div class="form-group col-lg-12 col-sm-12 col-md-12 -col-xs-12">
												<table style="width:100%" class="table-bordered table tablelook2">
													<tbody>
													<tr>
														<td>Carrier</td>
														<td>Method</td>
														<td>Information</td>
														<td>Price!</td>
													</tr>
													<tr>
														<td><label class="radio">
															<input type="radio" name="optionsRadios" id="optionsRadios1"
																value="option1" checked>
															<i class="fa  fa-plane fa-2x"></i> </label></td>
														<td> By Road</td>
														<td>Pick up in-store</td>
														<td>Free!</td>
													</tr>
													<tr>
														<td><label class="radio">
															<input type="radio" name="optionsRadios" id="optionsRadios2"
																value="option2">
															<i class="fa fa-truck fa-2x"></i> </label></td>
														<td>By Air</td>
														<td>Delivery next day!</td>
														<td>Free!</td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="cartFooter w100">
											<div class="box-footer">
												<div class="pull-left"><a href="javascript:void(0)" class="btn btn-default" @click="showStep2 = true; showStep3 = false; activeTab = 2;"> <i
														class="fa fa-arrow-left"></i> &nbsp; Shipping address </a></div>
												<div class="pull-right"><a @click="paymentMethod();" href="javascript:void(0)"
																		class="btn btn-primary btn-small "> Payment Method
													&nbsp; <i class="fa fa-arrow-circle-right"></i> </a></div>
											</div>
										</div>
										<!--/ cartFooter -->
										<!--/row-->
									</div>
								</div>
							</div>
		                    <!-- Payment -->
		                    <div class="w100 clearfix" v-show='showStep4'>
								<div class="row userInfo">
									<div class="col-lg-12">
										<h2 class="block-title-2"> Payment method </h2>

										<p>Please select the preferred shipping method to use on this order.</p>
										<hr>
									</div>
									<div class="col-xs-12 col-sm-12">
										<div class="paymentBox">
											<div class="panel-group paymentMethod" id="accordion">
												<div class="panel panel-default">
													<div class="panel-heading panel-heading-custom">
														<h4 class="panel-title"><a class="cashOnDelivery" data-toggle="collapse"
																				data-parent="#accordion" href="#collapseOne">
															<span class="numberCircuil">Option 1</span> <strong> Cash on
															Delivery</strong> </a></h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse in">
														<div class="panel-body">
															<p>All transactions are secure and encrypted, and we neverstor To
																learn more, please view our privacy policy.</p>
															<br>
															<label class="radio-inline" for="radios-4">
																<input name="radios" check="checked" id="radios-4" value="4" type="radio">
																Cash On Delivery </label>

															<div class="form-group">
																<label for="CommentsOrder">Add Comments About Your Order</label>
																<textarea id="CommentsOrder" class="form-control"
																		name="CommentsOrder" cols="26" rows="3"></textarea>
															</div>
															<div class="form-group clearfix">
																<label class="checkbox-inline" for="checkboxes-1">
																	<input name="checkboxes" id="checkboxes-1" value="1"
																		type="checkbox">
																	I have read and agree to the <a
																		href="">Terms & Conditions</a>
																</label>
															</div>
															<div class="pull-right"><a href="javascript:void(0);" @click="processOrder()" class="btn btn-primary btn-small "> Order
																&nbsp; <i class="fa fa-arrow-circle-right"></i> </a></div>
														</div>
													</div>
												</div>
												<div class="panel panel-default" style="display:none;">
													<div class="panel-heading panel-heading-custom">
														<h4 class="panel-title"><a data-toggle="collapse"
																				data-parent="#accordion" href="#collapseTwo">
															<span class="numberCircuil">Option 2</span><strong> PayPal</strong>
														</a></h4>
													</div>
													<div id="collapseTwo" class="panel-collapse collapse">
														<div class="panel-body">
															<p>All transactions are secure and encrypted, and we neverstor To
																learn more, please view our privacy policy.</p>
															<br>
															<label class="radio-inline" for="radios-3">
																<input name="radios" id="radios-3" value="4" type="radio">
																<!--<img src="" height="18" alt="paypal">--> Checkout with Paypal 
															</label>

															<div class="form-group">
																<label for="CommentsOrder2">Add Comments About Your
																	Order</label>
																<textarea id="CommentsOrder2" class="form-control"
																		name="CommentsOrder2" cols="26" rows="3"></textarea>
															</div>
															<div class="form-group clearfix">
																<label class="checkbox-inline" for="checkboxes-0">
																	<input name="checkboxes" id="checkboxes-0" value="1" type="checkbox"/>
																	I have read and agree to the <a
																		href="">Terms & Conditions</a>
																</label>
															</div>
															<div class="pull-right"><a href="" class="btn btn-primary btn-small "> Order
																&nbsp; <i class="fa fa-arrow-circle-right"></i> </a></div>
														</div>
													</div>
												</div>
												<div class="panel panel-default" style="display:none;">
													<div class="panel-heading panel-heading-custom">
														<h4 class="panel-title"><a class="masterCard" data-toggle="collapse"
																				data-parent="#accordion"
																				href="#collapseThree"> <span
																class="numberCircuil">Option 3</span> <strong>
															MasterCard</strong> </a></h4>
													</div>
													<div id="collapseThree" class="panel-collapse collapse">
														<div class="panel-body">
															<p>All transactions are secure and encrypted, and we neverstor To
																learn more, please view our privacy policy.</p>
															<br>

															<div class="panel open">
																<div class="creditCard">
																	<div class="cartBottomInnerRight paymentCard">
																	</div>
																	<span>Supported</span> <span>Credit Cards</span>

																	<div class="paymentInput">
																		<label for="CardNumber">Credit Card Number *</label>
																		<br>
																		<input id="CardNumber" type="text" name="Number">
																	</div>
																	<!--paymentInput-->
																	<div class="paymentInput">
																		<label for="CardNumber2">Name on Credit Card *</label>
																		<br>
																		<input type="text" name="CardNumber2" id="CardNumber2">
																	</div>
																	<!--paymentInput-->
																	<div class="paymentInput">
																		<div class="form-group">
																			<label>Expiration date *</label>
																			<br>

																			<div class="col-lg-4 col-md-4 col-sm-4 no-margin-left no-padding">
																				<select class="form-control" required
																						aria-required="true"
																						name="expire">
																					<option value="">Month</option>
																				</select>
																			</div>
																			<div class="col-lg-4 col-md-4 col-sm-4">
																				<select class="form-control" required
																						aria-required="true"
																						name="year">
																					<option value="">Year</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<!--paymentInput-->

																	<div style="clear:both"></div>
																	<div class="paymentInput clearfix">
																		<label for="VerificationCode">Verification Code
																			*</label>
																		<br>
																		<input type="text" id="VerificationCode"
																			name="VerificationCode" style="width:90px;">
																		<br>
																	</div>
																	<!--paymentInput-->

																	<div>
																		<input type="checkbox" name="saveInfo" id="saveInfoid">
																		<label for="saveInfoid">&nbsp;Save my Card
																			information</label>
																	</div>
																</div>
																<!--creditCard-->

																<div class="pull-right"><a href=""
																						class="btn btn-primary btn-small">
																	Order &nbsp; <i class="fa fa-arrow-circle-right"></i> </a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="cartFooter w100">
											<div class="box-footer">
												<div class="pull-left"><a href="javascript:void(0)" class="btn btn-default" @click="showStep3 = true; showStep4 = false; activeTab = 3;"> <i class="fa fa-arrow-left"></i> &nbsp; Billing address </a></div>
											</div>
										</div>
										<!--/row-->

									</div>
								</div>
							</div>
		                    <!--/row end-->
		                    <!-- Order -->
		                     <div class="w100 clearfix" v-show='showStep5'>
		                        <div class="row userInfo">
		                            <div class="col-xs-12 col-sm-12">
		                                <div class="cartContent w100 checkoutReview ">
		                                    <table class="cartTable table-responsive" style="width:100%">
		                                        <tbody>
													<tr class="CartProduct cartTableHeader">
														<td style="width:15%">Product</td>
														<td style="width:40%">Details</td>
														<td style="width:10%">QNT</td>
														<td style="width:15%">Total</td>
													</tr>

													<tr v-for="product in CartProduct.products.data" class="CartProduct" v-if="CartProduct.products.data.length > 0">
														<td class="CartProductThumb">
															<div><router-link v-bind:to="'/product/product_detail/'+ product.product_id+'/0'"><img :src="product.image" alt="img"></router-link>
															</div>
														</td>
														<td>
															<div class="CartDescription">
																<h4><router-link v-bind:to="'/product/product_detail/'+ product.product_id+'/0'">{{product.name}}</router-link></h4>
																<span class="size">12 x 1.5 L</span>

																<div class="price"><span>$ {{product.price*1}}</span></div>
															</div>
														</td>
														<td class="price">{{product.cart_quantity}}</td>
														<td class="price">$ {{product.price * product.cart_quantity}}</td>
													</tr>
													<tr v-if="!CartProduct.products.data">
														<td colspan="6" align="center">Your shopping cart is empty!</td>
													</tr>
		                                        </tbody>
		                                    </table>
		                                </div>
		                                <!--cartContent-->

		                                <div class="w100 costDetails">
		                                    <div class="table-block" id="order-detail-content">
		                                        <table class="std table" id="cart-summary">
		                                            <tr>
		                                                <td>Total products</td>
		                                                <td class="price"> $ {{CartProduct.products.TotalPrices}}</td>
		                                            </tr>
		                                            <tr style="">
		                                                <td>Shipping</td>
		                                                <td class="price"><span class="success">Free shipping!</span></td>
		                                            </tr>
		                                            <tr class="cart-total-price ">
		                                                <td>Total (tax excl.)</td>
		                                                <td class="price"> $ {{CartProduct.products.TotalPrices}}</td>
		                                            </tr>
		                                            <tr>
		                                                <td>Total tax</td>
		                                                <td id="total-tax" class="price">0.00</td>
		                                            </tr>
		                                            <tr>
		                                                <td> Total</td>
		                                                <td id="total-price" class="price"> $ {{CartProduct.products.TotalPrices}}</td>
		                                            </tr>
		                                            <tbody>
		                                            </tbody>
		                                        </table>
		                                    </div>
		                                </div>
		                                <!--/costDetails-->

										<div class="cartFooter w100">
											<div class="box-footer">
												<div class="pull-left"><a href="javascript:void(0)" class="btn btn-default" @click="showStep4 = true; showStep5 = false; activeTab = 4;">
													<i class="fa fa-arrow-left"></i> &nbsp; Payment method </a>
												</div>
												<div class="pull-right">
													<a href="javascript:void(0);" @click="submit()" class="btn btn-primary btn-small ">
														Confirm Order &nbsp; <i class="fa fa-check"></i>
													</a>
												</div>
											</div>
										</div>
		                                <!--/row-->


		                            </div>
		                        </div>
		                    </div>
		                    
		                    <!--/row end-->
		                    </div>

		                </div>
		            </div>
		            <!--/row end-->

		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
		            <div class="w100 cartMiniTable">
		                <table id="cart-summary" class="std table">
		                    <tbody>
		                    <tr>
		                        <td>Total products</td>
		                        <td class="price"> $ {{CartProduct.products.TotalPrices}}</td>
		                    </tr>
		                    <tr style="">
		                        <td>Shipping</td>
		                        <td class="price"><span class="success">Free shipping!</span></td>
		                    </tr>
		                    <tr class="cart-total-price ">
		                        <td>Total (tax excl.)</td>
		                        <td class="price"> $ {{CartProduct.products.TotalPrices}}</td>
		                    </tr>
		                    <tr>
		                        <td>Total tax</td>
		                        <td class="price" id="total-tax">$0.00</td>
		                    </tr>
		                    <tr>
		                        <td> Total</td>
		                        <td class=" site-color" id="total-price"> $ {{CartProduct.products.TotalPrices}}</td>
		                    </tr>
		                    </tbody>
		                    <tbody>
		                    </tbody>
		                </table>
		            </div>
		            <!--  /cartMiniTable-->

		        </div>
		        <!--/rightSidebar-->

		    </div>
		    <!--/row-->

		    <div style="clear:both"></div>
		</div>
		<!-- /.main-container-->
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
import Common from '../../../../helper/common'
import {post} from '../../../../helper/api'
import CartAction from '../../../../helper/cart'

export default {
    data() {
        return {
			CartProduct: CartAction.data,
			shippingList:{},
			zoneList:{},
			activeTab: 1,
			showStep1: true,
			showStep2: false,
			showStep3: false,
			showStep4: false,
			showStep5: false,
			customer_info: {},
			get_checkout_address:[],
			country:[],
			selectItem:{
				country:{},
				shipping_zone:{},
				payment_zone:{},
			},
			errors: [],
			data:{
				firstname:'',
				lastname:'',
				email:'',
				telephone:'',
				fax:'',
				custom_field:'',
				shipping_firstname:'',
				shipping_lastname:'',
				shipping_company:'',
				shipping_email:'',
				shipping_telephone:'',
				shipping_address_1:'',
				shipping_address_2:'',
				shipping_country:'',
				shipping_city:'',
				shipping_zone:'',
				shipping_postcode:'',
				shipping_custom_field:'',
				shipping_address_format:'',
				shipping_country_id:'',
				shipping_zone_id:'',
				shipping_method:'',
				shipping_code:'',
				same_as_shipping:true,
				payment_firstname:'',
				payment_lastname:'',
				payment_company:'',
				payment_email:'',
				payment_telephone:'',
				payment_address_1:'',
				payment_address_2:'',
				payment_country:'',
				payment_city:'',
				payment_zone:'',
				payment_postcode:'',
				payment_custom_field:'',
				payment_address_format:'',
				payment_country_id:'',
				payment_zone_id:'',
				payment_method:'',
				payment_code:'',
				comment:'',
				total:'',
				affiliate_id:'',
				commission:'',
				marketing_id:'',
				tracking:'',
				currency_id:'',
				currency_code:'',
				currency_value:'',
				order_status_id:'',
				ip:'',
				forwarded_ip:'',
				user_agent:'',
				language_id:'',
				accept_language:'',
			}	
		}
    },
    components:{

    },
    mounted(){
    	axios.get('/api/getLocations/').then(response => this.selectItem.country=response.data);
    	axios.get('/api/getShipping/').then(response => this.shippingList=response.data);
		axios.get('/api/getGeoZone/').then(response => this.zoneList=response.data);
    	// render dom select
    	// $('select.form-control').select2();
    	// The currently active tab, init as the 1st item in the tabs array
		this.activeTabName = this.tabs[1].name;
    },
    ready() {
       
    },
    created() {
    	// this.getCheckoutAddress()
		this.CustomerInfo();
    },
    methods: {
		CustomerInfo() {
            axios.get(`/api/customer_info`)
	        .then(response => {
				// console.log('data=>',response['data']['data']);
	            this.customer_info = response['data']['data'];
				this.data.firstname = this.customer_info.firstname;
				this.data.lastname = this.customer_info.lastname;
				this.data.email = this.customer_info.email;
				this.data.telephone = this.customer_info.telephone;
				this.data.payment_address_1 = this.customer_info.address_1;
				this.data.payment_address_2 = this.customer_info.address_2;
				this.data.payment_city = this.customer_info.payment_city;
				this.data.payment_zone = this.customer_info.payment_zone;
				this.data.payment_postcode = this.customer_info.postcode;
				this.data.payment_country = this.customer_info.payment_country;
				
				this.data.shipping_firstname = this.customer_info.firstname;
				this.data.shipping_lastname = this.customer_info.lastname;
				this.data.shipping_company = this.customer_info.company;
				this.data.shipping_address_1 = this.customer_info.address_1;
				this.data.shipping_address_2 = this.customer_info.address_2;
				this.data.shipping_city = this.customer_info.payment_city;
				this.data.shipping_zone = this.customer_info.payment_zone;
				this.data.shipping_code = this.customer_info.postcode;
				this.data.shipping_country = this.customer_info.payment_country;

	            this.isActive = !this.isActive;
	        })
	        .catch(e => {
	          this.errors.push(e)
	        })
        },
		shippingAddress(){
			this.errors = [];
			window.scrollTo(100,0)
			if (!this.data.firstname) {
				this.errors.push("First Name required.");
			}
			if (!this.data.email) {
				this.errors.push('Email required.');
			} else if (!this.validEmail(this.data.email)) {
				this.errors.push('Valid email required.');
			}

			if (!this.errors.length) {
				this.showStep1= false; 
				this.showStep2 = true;
				this.activeTab = 2;
				return true;
			}
		},
		shippingMethod(){
			this.showStep2 = false;
			this.showStep3 = true;
			this.activeTab = 3;
		},
		paymentMethod(){
			this.showStep3 = false;
			this.showStep4 = true;
			this.activeTab = 4;
		},
		processOrder(){
			this.showStep4 = false;
			this.showStep5 = true;
			this.activeTab = 5;
		},
		validEmail: function (email) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		},
    	getCheckoutAddress() {
            axios.get(`/api/get_checkout_address`)
	        .then(response => {
	            this.get_checkout_address = response.data['data']
	            this.isActive = !this.isActive
	        })
	        .catch(e => {
	          this.errors.push(e)
	        })
        },
		getCountry() {
            axios.get(`/api/country`)
	        .then(response => {
	            this.country = response['data']
	            this.isActive = !this.isActive
	        })
	        .catch(e => {
	          this.errors.push(e)
	        })
        },
    	submit() {
			axios.get(`/api/checkout`)
				.then(response => {
				Flash.setSuccess('Congratulations! Your order has been procceed.')
				this.$router.push('/account/orderlist')
			})
			.catch(e => {
				this.errors.push(e)
			})
	    },
	    onchange(item,id){
	    	if (item) {
		    	axios.get('/api/getLocations/'+id).then(response => this.selectItem[item]=response.data);
	    	}
	    },
	    test(t){
	    	alert(t)
	    }
	    
    },
    
}
</script>