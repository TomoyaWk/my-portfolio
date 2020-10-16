import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home";
import Works from "./views/Works";
import Blog from "./views/Blog";
import Article from "./views/Article";
import AdminIndex from "./views/AdminIndex";

Vue.use(Router);

export default new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/works",
            name: "works",
            component: Works
        },
        {
            path: "/blog/list",
            name: "blog",
            component: Blog
        },
        {
            path: "/blog/:id",
            name: "article",
            component: Article
        },
        {
            path: "/admin",
            name: "adminIndex",
            component: AdminIndex
        }
    ]
});
