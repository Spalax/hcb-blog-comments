define([
    "dojo/_base/declare",
    "hc-backend/layout/main/content/_ContentMixin",
    "dijit/_TemplatedMixin",
    "dojo/text!./templates/Container.html",
    "dojo/i18n!../nls/List",
    "hc-backend/router",
    "hcb-comments/list/widget/Grid",
    "hc-backend/dgrid/form/DeleteSelectedButton"
], function(declare, _ContentMixin, _TemplatedMixin,
            template, translation, router,
            Grid, DeleteSelectedButton) {
    return declare([ _ContentMixin, _TemplatedMixin ], {
        //  summary:
        //      List container. Contains widgets who responsible for
        //      displaying list of clients.
        templateString: template,

        baseClass: 'commentsList',
        
        postCreate: function () {
            try {
                this._gridWidget = new Grid({'class': this.baseClass+'Grid'});

                this._deleteWidget = new DeleteSelectedButton({'label': translation['deleteSelectedButton'],
                                                               'target': router.assemble('/delete', {}, true),
                                                               'name': 'comments',
                                                               'class': this.baseClass+'DeleteComments',
                                                               'grid': this._gridWidget});

            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        startup: function () {
            try {
                this.addChild(this._deleteWidget);
                this.addChild(this._gridWidget);
                this.inherited(arguments);
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        refresh: function () {
            try {
                this._gridWidget.refresh({keepScrollPosition: true});
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        }
    });
});
