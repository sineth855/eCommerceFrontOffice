import Vue from 'vue'
import VueRouter from 'vue-router'
import VueEditor from 'vue2-quill-editor'
// FrontEnd #######################
import App from './App.vue'
import FHome from './views/Components/frontend/home.vue'
//***** Account *****
import Account from './views/Components/frontend/account/account.vue'
import FSignIn from './views/Components/frontend/account/signin.vue'
import FRegister from './views/Components/frontend/account/register.vue'
import FLogin from './views/Components/frontend/account/login.vue'
import Dashboard from './views/Components/frontend/account/dashboard.vue'

import OrderList from './views/Components/frontend/account/order_list.vue'
import OrderInfo from './views/Components/frontend/account/order_info.vue'
import AddressList from './views/Components/frontend/account/address_list.vue'
import AddressAdd from './views/Components/frontend/account/address_add.vue'
import AddressForm from './views/Components/frontend/account/address_form.vue'
import AddressMy from './views/Components/frontend/account/address_my.vue'
import InformationUser from './views/Components/frontend/account/information_user.vue'
import WishList from './views/Components/frontend/account/wishlist.vue'

//***** products *****
import FCategory from './views/Components/frontend/product/category.vue'
import Product from './views/Components/frontend/product/product.vue'
import ProductDetail from './views/Components/frontend/product/product_detail.vue'
import Information from './views/Components/frontend/information/information.vue'
import InformationDetail from './views/Components/frontend/information/information_detail.vue'
// **** Cart ******
import Cart from './views/Components/frontend/checkout/cart.vue'
import CartView from './views/Components/frontend/checkout/cart_view.vue'
import Checkout from './views/Components/frontend/checkout/checkout.vue'
import CheckoutSuccess from './views/Components/frontend/checkout/checkout_success.vue'
// **** Store *****
import Store from './views/Components/frontend/store/store.vue'

// **** Footer *****
import Footer from './views/Components/frontend/common/_footer.vue'

//import router from './router'
import VueResource from 'vue-resource'
import Vuetify from 'vuetify'

Vue.use(Vuetify)
Vue.use(VueResource);
Vue.use(VueRouter)
Vue.use(VueEditor)

Vue.http.options.credentials = true;

Vue.http.options.xhr = {
  withCredentials: true
}
Vue.http.options.emulateJSON = true
Vue.http.options.emulateHTTP = true
Vue.http.options.crossOrigin = true

Vue.http.headers.common['Access-Control-Allow-Origin'] = 'http://localhost:9200'
Vue.http.headers.common['Access-Control-Request-Method'] = '*'
Vue.http.headers.common['Content-Type'] = 'application/x-www-form-urlencoded'
Vue.http.headers.common['Accept'] = 'application/json, text/plain, */*'
Vue.http.headers.common['Access-Control-Allow-Headers'] = 'Origin, Accept, Content-Type, Authorization, Access-Control-Allow-Origin'

const router = new VueRouter({
  mode: 'history',
  routes: [
    // routing FrontEnd
    { path: '/', name:'fhome',component: FHome },
    {path: '/product', name:'product',component:Product,
        children: [
            {
              path: ':name-:id(\\d+)-:catId(\\d+)',
              name: ProductDetail,
              component: ProductDetail,props:true
            },
            {
              path: 'category_product/:id',
              name: "Product",
              component: FCategory,props:true
            }
        ]
    },
    {
      path: '/:catName', name: "ProductCategory", component: Product,
        children: [
          {
            path: ':name/:name-:id(\\d+)',
            name: "FCategory",
            component: FCategory,
            props:true
          }
      ]
    },
    {
      path: '/login',
      name:'login_account',
      component: FLogin
    },
    {
      path: '/customer/register',
      name:'register',
      component: FRegister
    },
    { path: '/account', name:'account', component: Account,
      children: [
          {
            path: 'signin',
            name:'signin',
            component: FSignIn
          },
          {
            path: 'login',
            name:'login',
            component: FLogin
          },
          {
            path: 'dashboard',
            name: 'dashboard',
            component: Dashboard
          },
          {
            path: 'orderlist',
            name: 'orderlist',
            component: OrderList
          },
          {
            path: 'order_info/:id',
            name: 'orderinfo',
            component: OrderInfo,props:true
          },
          {
            path: 'addresslist',
            name: 'addresslist',
            component: AddressList
          },
          {
            path: 'addressadd',
            name: 'addressadd',
            component: AddressAdd
          },
          {
            path: 'informationuser',
            name: 'informationuser',
            component: InformationUser
          },
          {
            path: 'wishlist',
            name: 'wishlist',
            component: WishList
          },
          {
            path: 'addressmy',
            name: 'addressmy',
            component: AddressMy
          },
          {
            path: 'checkoutsuccess',
            name:'checkoutsuccess',
            component: CheckoutSuccess
          }
      ]
    },
    {
      path: '/cart/list',
      name:'cartview',
      component: CartView
    },
    {
      path: '/cart/checkout',
      name:'checkout',
      component: Checkout
    },
    { 
      path: '/information', name:'information',component: Information,
      children:[
        {
          path: 'information_detail/:id',
          name:'InformationDetail',
          component: InformationDetail,props:true
        }
      ]
    },
    { path: '/store/:name/:id', name:'Store',component: Store,props:true},

  ],
  scrollBehavior (to, from, savedPosition) {
    return { x: 10, y: 0 }
  },
})

const app = new Vue({
    // el: '#root',
    router,
    template: `
    <app></app>`,
    components: { App },
}).$mount('#root')