//***** Account *****
// import Account from './views/Components/frontend/account/account.vue'
// import FSignIn from './views/Components/frontend/account/signin.vue'
// import FRegister from './views/Components/frontend/account/register.vue'
// import FLogin from './views/Components/frontend/account/login.vue'
// import Dashboard from './views/Components/frontend/account/dashboard.vue'

// import OrderList from './views/Components/frontend/account/order_list.vue'
// import OrderInfo from './views/Components/frontend/account/order_info.vue'
// import AddressList from './views/Components/frontend/account/address_list.vue'
// import AddressAdd from './views/Components/frontend/account/address_add.vue'
// import AddressForm from './views/Components/frontend/account/address_form.vue'
// import AddressMy from './views/Components/frontend/account/address_my.vue'
// import InformationUser from './views/Components/frontend/account/information_user.vue'
// import WishList from './views/Components/frontend/account/wishlist.vue'

export default ({ authGuard, guestGuard }) => [
  // { path: '/', name: 'welcome', component: require('~/pages/welcome.vue') },
  { path: '/account/login', name: 'signin', component: require('../views/Components/frontend/account/login.vue') },
  // Authenticated routes.
  ...authGuard([
    { path: '/account',
      name: 'account', 
      meta: { breadcrumb: true }, 
      redirect: '/account',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: 'dashboard',
          meta: { breadcrumb: true },
          name: 'Dashboard',
          component: require('../views/Components/frontend/account/dashboard.vue')
        }
      ]
    },
    {
      path: '/cart/checkout',
      name:'checkout',
      component: require('../views/Components/frontend/checkout/checkout.vue')
    },
  ]),
  // Guest routes.
  ...guestGuard([
    { path: '/', name: 'home', component: require('../views/Components/frontend/home.vue') }
  ]),
  {
    path: '*',
    meta: {
      public: true,
    },
    component: require('../views/Components/frontend/page/404error.vue')
  }
  // { path: '*', component: require('~/pages/errors/404.vue') }
]
