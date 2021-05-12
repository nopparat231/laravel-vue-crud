import AllProduct from './components/AllProduct.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';

import MenuList from './components/menu/MenuList.vue';
import CreatMenu from './components/menu/CreatMenu.vue';
import EditMenu from './components/menu/EditMenu.vue';
import OrderMenu from './components/menu/OrderMenu.vue';
import OrderList from './components/menu/ListOrder.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProduct
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct
    },

    {
        name: 'menu-list',
        path: '/menu-list',
        component: MenuList
    },
    {
        name: 'menu-creat',
        path: '/menu-creat',
        component: CreatMenu
    },
    {
        name: 'menu-edit',
        path: '/menu-edit/:id',
        component: EditMenu
    },
    {
        name: 'menu-order',
        path: '/menu-order/:id',
        component: OrderMenu
    },
    {
        name: 'order-list',
        path: '/order-list',
        component:OrderList
    }
];