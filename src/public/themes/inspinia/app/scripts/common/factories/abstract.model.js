(function() { "use strict";
/**
 * @author ntd1712
 */
chaos.factory("AbstractModel", Anonymous);

function Anonymous() {
    // Private static attributes
    var map = {
        data: "data",
        value: "value"
    };
    var $data;

    /**
     * @constructor
     * @param {Object} data
     * @param {Object[]} [fields]
     */
    function AbstractModel(data, fields) {
        $data = data || {};

        if (void 0 !== fields) {
            for (var i = 0, len = fields.length; i < len; i++) {
                this[fields[i][map.data]] = $data[fields[i][map.data]] || fields[i][map.value];
            }
        }
    }

    // Public, non-privileged methods
    AbstractModel.prototype = {
        /**
         * @returns {Object}
         */
        getData: function() {
            return $data;
        }
    };

    // Public static methods
    /**
     * @returns {string}
     */
    AbstractModel.getRoute = function() {
        return "";
    };

    /**
     * @return {Object[]}
     */
    AbstractModel.getFields = function() {
        return [];
    };

    return AbstractModel;
}

})();