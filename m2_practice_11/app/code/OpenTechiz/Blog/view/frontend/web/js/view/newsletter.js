define(
    [
        'ko',
        'uiComponent'
    ],
    function (ko, Component) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'OpenTechiz_Blog/newsletter'
            },
            isRegisterNewsletter: true
        });
    }
);
