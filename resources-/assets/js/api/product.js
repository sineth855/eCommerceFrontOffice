import axios from 'axios'
import config from '~/config/config'
import Flash from '~/services/flash'
var _apiLatestProduct = '/api/latest';
var _apiBestSellerProduct = '/api/bestSeller';
var _apiProductByCategory = '/api/attribute';

// Latest Product
export function fetchLatestProduct() {
	return axios.get(_apiLatestProduct)
	.then(response => {
		if(response.data.success==true){
			Flash.setLoading(false)
			return response['data'];
		}else{
			return response['data'];
		}
	})
	.catch(e => {
		this.errors.push(e)
	})
}
// Best Seller Product
export function fetchBestSellerProduct() {
	return axios.get(_apiBestSellerProduct)
	.then(response => {
		if(response.data.success==true){
			Flash.setLoading(false)
			return response['data'];
		}else{
			return response['data'];
		}
	})
	.catch(e => {
		this.errors.push(e)
	})
}

// fetch data
export function fetchProductByCategory(category_id) {
	return axios.get(_apiProductByCategory)
	.then(response => {
		if(response.data.success==true){
			Flash.setLoading(false)
			return response['data'];
		}else{
			return response['data'];
		}
	})
	.catch(e => {
		this.errors.push(e)
	})
}