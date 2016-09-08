angular.module('AlphenHotel',
    ['ngMaterial', 'ngMessages']).controller('DatePickerRoomSearch', function($scope) {
  $scope.arrive = new Date();
  $scope.deperture = new Date();

  $scope.minDate = new Date(
      $scope.arrive.getFullYear(),
      $scope.arrive.getMonth() - 2,
      $scope.arrive.getDate());

  $scope.maxDate = new Date(
      $scope.arrive.getFullYear(),
      $scope.arrive.getMonth() + 2,
      $scope.arrive.getDate());

  $scope.onlyWeekendsPredicate = function(date) {
    var day = date.getDay();
    return day === 0 || day === 6;
  };
});
