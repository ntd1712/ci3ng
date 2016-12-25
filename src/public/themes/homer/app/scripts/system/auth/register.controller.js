(function() { "use strict";
/**
 * @author ntd1712
 */
angular.module("homer").controller("RegisterController", Anonymous);

function Anonymous($scope, RegisterRepository, AbstractController) {
    function RegisterController() {
        this.__super__.constructor.apply(this, arguments);
    }
    extend(RegisterController, AbstractController);

    RegisterController.prototype.register = function(model) {
        this.repository.store(model).then(
            function() {
                delete $scope.$parent.error;
                $scope.$parent.growl = "YOU_HAVE_SUCCESSFULLY_REGISTERED";
                $scope.$state.go("login", {}, { reload: true });
            },
            function(response) {
                $scope.$parent.error = response.data.error || t("COULD_NOT_REGISTER");
            });

        return this;
    };

    RegisterController.prototype.cancel = function() {
        delete $scope.model;
    };

    return RegisterController.newInstance(arguments);
}

})();