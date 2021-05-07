import AllProduct from './components/AllProduct.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';
import MenuList from './components/menu/MenuList.vue';
 
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
    }
];