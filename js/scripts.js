var app = angular.module("pdf_api", []);
app.run(function($rootScope) {
    $rootScope.title = "@CCESSNET"; 
});

app.controller("controller", function($http, $rootScope, $scope) {
    var ctrl = this;
    ctrl.Videos= [];
    ctrl.Video="videos.webm/itaipava.webm";
    ctrl.Texto ="Itaipava é um distrito (o terceiro distrito da cidade) e um bairro de Petrópolis, no estado do Rio de Janeiro, no Brasil. Conhecida como refúgio de inverno de diversas celebridades e da alta sociedade do Rio de Janeiro, o bairro abriga diversos condomínios de alto padrão de casas e de prédios, clubes, e restaurantes com a mais refinada gastronomia da Região Serrana. "
                + "Os inúmeros condomínios fechados de alto padrão que localizam-se em Itaipava, assim como pequenos shoppings com sofisticadas lojas e grifes, são ocupados, frequentados e mantidos por parte da sociedade da capital do estado. O distrito ainda é famoso por abrigar uma gama de pousadas com ampla infraestrutura e de hotéis de alto padrão, sendo alguns deles de categoria 5 Estrelas, como o Clarion Hotel Itaipava. "
                + "Texto retirado de https://pt.wikipedia.org/wiki/Itaipava";
    ctrl.Keyword = "";
    ctrl.Resultado = 0;
    ctrl.Achado = true;

    $http({
        method : "GET",
        url : "json/video_backup.json"
    }).then(function mySuccess(response) {
        ctrl.Videos = response.data;
        console.log(ctrl.Videos);
    }, function myError(response) {
        ctrl.Videos = response.statusText;
        // console.log(ctrl.Videos);
    });

    ctrl.Buscar = function() { 
        ctrl.Resultado = 0;
        ctrl.Videos.forEach(function(el) {
            // console.log(l.nome);
            if(angular.lowercase(el.nome) == angular.lowercase(ctrl.Keyword)) {
                //console.log(el.nome);
                ctrl.Video = "videos.webm/" + el.link; 
                ctrl.Texto = el.nome;
                ctrl.myVideo = document.getElementsByTagName('video')[0];
                ctrl.myVideo.src = ctrl.Video;
                ctrl.myVideo.load();
                ctrl.myVideo.play();
                console.log(ctrl.Video);
                ctrl.Resultado = 1;
            }    
            if(ctrl.Resultado == 1){
                ctrl.Achado = true;
            }else {
                ctrl.Achado = false;
            }
        });
      };
    
    $rootScope.setURL= function(urlLink){
        $rootScope.link = urlLink;
        console.log($rootScope.link);
        // $rootScope.$apply();
    };


}); 

app.directive('iframeDirective', ['$sce','$rootScope', function($sce, $rootScope) {
    return {
    restrict: 'E',
    template: '<iframe src="{{ trustedUrl }}" frameborder="0" allowfullscreen></iframe>',
    link: function(scope) {
        scope.trustedUrl = $sce.trustAsResourceUrl($rootScope.link);
    }
    }
}]);
