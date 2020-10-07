import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home";
import Works from "./views/Works";
import Blog from "./views/Blog";

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
        }
    ]
});
