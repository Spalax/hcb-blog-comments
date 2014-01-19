define([
    'dojo/_base/declare',
    'hc-backend/layout/main/content/_ContentMixin',
    'dijit/_TemplatedMixin',
    'dojo/text!./templates/Container.html'
], function (declare, _ContentMixin, _TemplatedMixin, template) {
    return declare([
        _ContentMixin,
        _TemplatedMixin
    ], {
        templateString: template,

        postCreate: function () {
            // summary:
            //      Creating store with data from back-end and initialize Menu widget
            //      with requested data.
            try {

            } catch (e) {
                console.error(this.declaredClass + ' ' + arguments.callee.nom, arguments, e);
                throw e;
            }
        }
    });
});
