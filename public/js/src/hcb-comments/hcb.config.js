define([], function() {
    return {
        "route": "/comments",
        "prio": 4,
        "modules": [{
            "route": "",
            "module": "list/Container"
        }, {
            "route": "/show/:id",
            "module": "show/Container"
        }]
    };
});
