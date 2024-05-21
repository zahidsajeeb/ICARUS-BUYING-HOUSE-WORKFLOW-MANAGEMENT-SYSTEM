import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';
import Posts from '../components/Posts';
import EditPost from '../components/EditPost';
import AddPost from '../components/AddPost';
import AddRequisition from '../sample/add_requisition';
import PendingRequisition from '../sample/pending_requisition';
import Approval from '../sample/approval';
import Buyer from '../settings/buyer/index';
import EditBuyer from '../settings/buyer/edit_buyer';
import Report from '../sample/report';
import CadIndex from "../sample/cad_index";
import ViewRequisition from "../sample/view_requisition";

import User from "../settings/user/index";
import EditUser from "../settings/user/edit";
import Role from "../settings/role/index";
import Order from "../order/order";
import CommercialOrder from "../order/commercial/order_form";
import EditCommercialOrder from "../order/commercial/edit_order_form";
import EditFabricOrder from "../order/fabric/edit_order_form";
import EditTrimsOrder from "../order/trims/edit_order_form";
import EditMerchantOrder from "../order/merchandising/edit_order_form";
import EditProductionOrder from "../order/production/edit_order_form";
import FabricOrderForm from "../order/fabric/order_form";
import TrimsOrderForm from "../order/trims/order_form";
import MerchantOrderForm from "../order/merchandising/order_form";
import ProductionOrderForm from "../order/production/order_form";
import CommercialOrderList from "../order/commercial/order_list";
import FabricOrderList from "../order/fabric/order_list";
import TrimsOrderList from "../order/trims/order_list";
import MerchantOrderList from "../order/merchandising/order_list";
import ProductionOrderList from "../order/production/order_list";
import EditOrder from '../order/edit';
import OrderReport from "../order/admin_report";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'posts',
        path: '/posts',
        component: Posts
    },
    {
        name: 'addpost',
        path: '/posts/add',
        component: AddPost
    },
    {
        name: 'editpost',
        path: '/posts/edit/:id',
        component: EditPost
    },
    {
        name: 'add_requisition',
        path: '/add_requisition',
        component: AddRequisition
    },
    {
        name: 'pending_requisition',
        path: '/pending_requisition',
        component: PendingRequisition
    },
    {
        name: 'approval',
        path: '/sample/approval/:id',
        component: Approval
    },
    {
        name: 'buyer',
        path: '/settings/buyer',
        component: Buyer
    },
    {
        name: 'edit_buyer',
        path: '/settings/buyer/edit/:id',
        component: EditBuyer
    },
    {
        name: 'report',
        path: '/report',
        component: Report
    },
    {
        name: 'cad_index',
        path: '/cad_index',
        component: CadIndex
    },
    {
        name: 'view_requisition',
        path: '/sample/view_requisition/:id',
        component: ViewRequisition
    },
    {
        name: 'settings/user',
        path: '/settings/user',
        component: User
    },
    {
        name: 'edit_user',
        path: '/settings/edit_user/:id',
        component: EditUser
    },
    {
        name: 'settings/role',
        path: '/settings/role',
        component: Role
    },
    {
        name: 'order',
        path: '/order',
        component: Order
    },
    {
        name: 'commercial_order',
        path: '/commercial_order',
        component: CommercialOrder
    },
    {
        name: 'edit_commercial_order',
        path: '/order/edit_commercial_order/:id',
        component: EditCommercialOrder
    },
    {
        name: 'edit_fabric_order',
        path: '/order/edit_fabric_order/:id',
        component: EditFabricOrder
    },
    {
        name: 'edit_trims_order',
        path: '/order/edit_trims_order/:id',
        component: EditTrimsOrder
    },
    {
        name: 'edit_merchant_order',
        path: '/order/edit_merchant_order/:id',
        component: EditMerchantOrder
    },
    {
        name: 'edit_production_order',
        path: '/order/edit_production_order/:id',
        component: EditProductionOrder
    },
    {
        name: 'fabric_order',
        path: '/order/fabric_order_form/:id',
        component: FabricOrderForm
    },
    {
        name: 'trims_order_form',
        path: '/order/trims_order_form/:id',
        component: TrimsOrderForm
    },
    {
        name: 'merchant_order_form',
        path: '/order/merchant_order_form/:id',
        component: MerchantOrderForm
    },
    {
        name: 'production_order_form',
        path: '/order/production_order_form/:id',
        component: ProductionOrderForm
    },
    {
        name: 'commercial_order_list',
        path: '/commercial_order_list',
        component: CommercialOrderList
    },
    {
        name: 'fabric_order_list',
        path: '/fabric_order_list',
        component: FabricOrderList
    },
    {
        name: 'trims_order_list',
        path: '/trims_order_list',
        component: TrimsOrderList
    },
    {
        name: 'merchant_order_list',
        path: '/merchant_order_list',
        component: MerchantOrderList
    },
    {
        name: 'production_order_list',
        path: '/production_order_list',
        component: ProductionOrderList
    },
    {
        name: 'edit_order',
        path: '/order/edit/:id',
        component: EditOrder
    },
    {
        name: 'order_report',
        path: '/order_report',
        component: OrderReport
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
