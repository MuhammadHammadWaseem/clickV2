/*
|
| MAIN CONTROLLER
|
*/
sampleApp.controller("MainCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.leftnav = 1;
    $scope.loc = $location.path();

    $scope.$on("$routeChangeSuccess", function ($currentRoute, $previousRoute) {
      $scope.loc = $location.path();
    });

    $scope.togglenav = function () {
      if ($scope.leftnav == 1) $scope.leftnav = 0;
      else $scope.leftnav = 1;
    };

    $scope.back = function () {
      $window.history.back();
    };
  },
]);

/*
|
| PAY CONTROLLER
|
*/
sampleApp.controller("PayCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.idevent = window.location.pathname.split("/")[2];

    $http({
      method: "POST",
      url: "/pay-datas",
      data: { idevent: window.location.pathname.split("/")[2], code: $scope.discode, },
    }).then(function (response) {
      // console.log(response);
      $scope.subusa = response.data[0].subusa;
      $scope.tpsusa = response.data[0].tpsusa;
      $scope.tvqusa = response.data[0].tvqusa;
      $scope.totusa = response.data[0].totusa;
      $scope.subcan = response.data[0].subcan;
      $scope.tpscan = response.data[0].tpscan;
      $scope.tvqcan = response.data[0].tvqcan;
      $scope.totcan = response.data[0].totcan;

      $scope.linkcan = response.data[0].linkcan;
      $scope.linkusa = response.data[0].linkusa;
      $scope.mydiscount = response.data[0].discount;
      $scope.subusao = response.data[0].subusao;
      $scope.subcano = response.data[0].subcano;
    });

    $http({
      method: "POST",
      url: "/pay-check",
      data: { idevent: window.location.pathname.split("/")[2], code: $scope.discode, },
    }).then(function (response) {
      console.log(response.data);
      if (response.data.is_paid == 1) {
        console.log(response.data.url + "/event/" + $scope.idevent + "/general-infos")
        window.location.href = response.data.url + "/event/" + $scope.idevent + "/general-infos";
      }
    });

    $scope.try = function () {
      $http({
        method: "POST",
        url: "/pay-datas",
        data: {
          idevent: window.location.pathname.split("/")[2],
          code: $scope.discode,
        },
      }).then(function (response) {
        //console.log(response);
        $scope.subusa = response.data[0].subusa;
        $scope.tpsusa = response.data[0].tpsusa;
        $scope.tvqusa = response.data[0].tvqusa;
        $scope.totusa = response.data[0].totusa;
        $scope.subcan = response.data[0].subcan;
        $scope.tpscan = response.data[0].tpscan;
        $scope.tvqcan = response.data[0].tvqcan;
        $scope.totcan = response.data[0].totcan;

        $scope.linkcan = response.data[0].linkcan;
        $scope.linkusa = response.data[0].linkusa;
        $scope.mydiscount = response.data[0].discount;
        $scope.subusao = response.data[0].subusao;
        $scope.subcano = response.data[0].subcano;
      });
    };

    $scope.back = function () {
      $window.history.back();
    };
  },
]);

/*
|
| THANKYOU CONTROLLER
|
*/
sampleApp.controller("ThankyouCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    let allprem = window.location.search.split('&');
    //console.log("allprem: " + allprem.length);
    let amount = '';
    let payerID = '';
    let tokenID = '';
    if (allprem.length > 2) {
      payerID = allprem[1].split('=')[1];
      tokenID = allprem[2].split('=')[1];
      amount = allprem[0].split('=')[1];
    } else if (allprem.length > 1) {
      payerID = allprem[1].split('=')[1];
      amount = allprem[0].split('=')[1];
    }

    $http({
      method: "POST",
      url: "/pay",
      data: { idevent: window.location.pathname.split("/")[2], payerID: payerID, token: tokenID, amount: amount },
    }).then(function (response) {
      //console.log(response);
    });
    //console.log(tokenID);
    $scope.back = function () {
      $window.history.back();
    };
  },
]);

sampleApp.controller("ThankyouCtrlFR", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    let allprem = window.location.search.split('&');
    let amount = '';
    let payerID = '';
    let tokenID = '';
    if (allprem.length > 2) {
      payerID = allprem[1].split('=')[1];
      tokenID = allprem[2].split('=')[1];
      amount = allprem[0].split('=')[1];
    } else if (allprem.length > 1) {
      payerID = allprem[1].split('=')[1];
      amount = allprem[0].split('=')[1];
    }
    $http({
      method: "POST",
      url: "/pay/fr",
      data: { idevent: window.location.pathname.split("/")[2], payerID: payerID, token: tokenID, amount: amount },
    }).then(function (response) {
      //console.log(response);
    });

    $scope.back = function () {
      $window.history.back();
    };
  },
]);

/*
|
| GENERAL INFOS CONTROLLER
|
*/
sampleApp.controller("GeneralinfosCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.saveyes = 0;
    $scope.groomok = 0;
    $scope.brideok = 0;

    $scope.myImage1 = "";
    $scope.myCroppedImage1 = "";

    $scope.myImage2 = "";
    $scope.myCroppedImage2 = "";

    $scope.filename = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 600);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      $scope.eventtype = response.data.type;
      $scope.eventname = response.data.name;
      //console.log(response.data);
      $scope.isCouple = response.data.isCouple;
      $scope.eventdate = new Date(response.data.date);
      $scope.bridefname = response.data.bridefname;
      $scope.bridelname = response.data.bridelname;
      $scope.bridesummary = response.data.bridesummary;
      $scope.groomfname = response.data.groomfname;
      $scope.groomlname = response.data.groomlname;
      $scope.groomsummary = response.data.groomsummary;
      $scope.summary = response.data.summary;
      $scope.boolcerimony = response.data.boolcerimony == 1 ? true : false;
      $scope.ceraddress = response.data.ceraddress;
      $scope.cerAddressLink = response.data.cerAddressLink;
      $scope.recAddressLink = response.data.recAddressLink;
      $scope.parAddressLink = response.data.parAddressLink;
      $scope.cercountry = response.data.cercountry;
      $scope.cerprovince = response.data.cerprovince;
      $scope.cercity = response.data.cercity;
      $scope.cerpc = response.data.cerpc;
      $scope.certime = new Date(response.data.certime);
      $scope.cerdesc = response.data.cerdesc;
      $scope.boolreception = response.data.boolreception == 1 ? true : false;
      $scope.recaddress = response.data.recaddress;
      $scope.reccountry = response.data.reccountry;
      $scope.recprovince = response.data.recprovince;
      $scope.reccity = response.data.reccity;
      $scope.recpc = response.data.recpc;
      $scope.rectime = new Date(response.data.rectime);
      $scope.recdesc = response.data.recdesc;
      $scope.boolparty = response.data.boolparty == 1 ? true : false;
      $scope.parname = response.data.parname;
      $scope.paraddress = response.data.paraddress;
      $scope.parcountry = response.data.parcountry;
      $scope.parprovince = response.data.parprovince;
      $scope.parcity = response.data.parcity;
      $scope.parpc = response.data.parpc;
      $scope.partime = new Date(response.data.partime);
      $scope.pardesc = response.data.pardesc;
      $scope.imgbride = response.data.imgbride;
      $scope.imggroom = response.data.imggroom;

      $scope.$watchGroup(
        [
          "myCroppedImage1",
          "myCroppedImage2",
          "eventname",
          "eventdate",
          "bridefname",
          "bridelname",
          "bridesummary",
          "groomfname",
          "groomfname",
          "groomsummary",
          "summary",
          "boolcerimony",
          "ceraddress",
          "cerAddressLink",
          "cercountry",
          "cerprovince",
          "cercity",
          "cerpc",
          "certime",
          "cerdesc",
          "boolreception",
          "recaddress",
          "recAddressLink",
          "reccountry",
          "recprovince",
          "reccity",
          "recpc",
          "rectime",
          "recdesc",
          "boolparty",
          "parname",
          "paraddress",
          "parAddressLink",
          "parcountry",
          "parprovince",
          "parcity",
          "parpc",
          "partime",
          "pardesc",
        ],
        function (newValue, oldValue) {
          if (newValue != oldValue) $scope.saveyes = 1;
        }
      );
    });

    $scope.saveall = function () {
      const $timeCer = $('#timeCer');
      const $rectime = $('#rectime');
      const $timePar = $('#timePar');
    
      function showError(element, message) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: message,
          confirmButtonText: "OK",
        });
      }
    
      function validateTimeInput($element, message) {
        if ($element.attr('required') === 'required' && !$element.val()) {
          showError($element, message);
          return false; // Return false if validation fails
        }
        return true; // Return true if validation passes
      }
    
      // Validate all required fields
      const isTimeCerValid = validateTimeInput($timeCer, "Please select ceremony time");
      const isRectimeValid = validateTimeInput($rectime, "Please select reception time");
      const isTimeParValid = validateTimeInput($timePar, "Please select party time");
    
      // If any validation fails, return without making the HTTP request
      if (!isTimeCerValid || !isRectimeValid || !isTimeParValid) {
        return;
      }

      
      
      $http({
        method: "POST",
        url: "/edit-event",
        data: {
          idevent: window.location.pathname.split("/")[2],
          eventname: $scope.eventname,
          eventdate: $scope.eventdate.toLocaleString(),
          bridefname: $scope.bridefname,
          bridelname: $scope.bridelname,
          bridesummary: $scope.bridesummary,
          groomfname: $scope.groomfname,
          groomlname: $scope.groomlname,
          groomsummary: $scope.groomsummary,
          summary: $scope.summary,
          boolcerimony: $scope.boolcerimony,
          ceraddress: $scope.ceraddress,
          cerAddressLink: $scope.cerAddressLink,
          recAddressLink: $scope.recAddressLink,
          parAddressLink: $scope.parAddressLink,
          cercountry: $scope.cercountry,
          cerprovince: $scope.cerprovince,
          cercity: $scope.cercity,
          cerpc: $scope.cerpc,
          certime: $scope.certime,
          cerdesc: $scope.cerdesc,
          boolreception: $scope.boolreception,
          recaddress: $scope.recaddress,
          reccountry: $scope.reccountry,
          recprovince: $scope.recprovince,
          reccity: $scope.reccity,
          recpc: $scope.recpc,
          rectime: $scope.rectime,
          recdesc: $scope.recdesc,
          boolparty: $scope.boolparty,
          parname: $scope.parname,
          paraddress: $scope.paraddress,
          parcountry: $scope.parcountry,
          parprovince: $scope.parprovince,
          parcity: $scope.parcity,
          parpc: $scope.parpc,
          partime: $scope.partime,
          pardesc: $scope.pardesc,
          imgbride: $scope.myCroppedImage1,
          imggroom: $scope.myCroppedImage2,
        },
      }).then(function (response) {
        if (response.data == 1) {
          Swal.fire({
            title: 'Success',
            text: 'Your changes have been saved',
            icon: 'success',
            confirmButtonText: 'OK'
          });
          $scope.saveyes = 0;
        } else {
          Swal.fire({
            title: 'Error',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    };

    var handleFileSelect1 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.brideok = 1;
          $scope.myImage1 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    var handleFileSelect2 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.groomok = 1;
          $scope.myImage2 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    angular
      .element(document.querySelector("#fileInput1"))
      .on("change", handleFileSelect1);
    angular
      .element(document.querySelector("#fileInput2"))
      .on("change", handleFileSelect2);

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
    var yyyy = today.getFullYear();
    if (dd < 10) dd = "0" + dd;
    if (mm < 10) mm = "0" + mm;
    today = yyyy + "-" + mm + "-" + dd + "T00:00";
    document.getElementById("eventdate").setAttribute("min", today);
  },
]);

/*
|
| WEBPAGE CONTROLLER
|
*/
sampleApp.controller("WebpageCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  "$document",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval,
    $document
  ) {
    $scope.loading = 1;
    $scope.saveyes = 0;
    $scope.csrf;
    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        console.log(response.data.id_event);
        $scope.galleries = response.data.photogallery;
        $scope.csrf = response.data.csrfToken;
        document.getElementById('csrf').value = $scope.csrf;
        document.getElementById('eventId').value = response.data.id_event;
      });
    };

    $scope.showevent();

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $scope.idevent = window.location.pathname.split("/")[2];

    $scope.loadiframe = function () {
      $scope.url = "/website/" + $scope.idevent;
    };

    $scope.loadiframe();

    //--------------------------------------------
    var handleFileSelect3 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.mainimageok = 1;
          $scope.myImage3 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    var handleFileSelect4 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.cerimageok = 1;
          $scope.myImage4 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    var handleFileSelect5 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.recimageok = 1;
          $scope.myImage5 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    var handleFileSelect6 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.parimageok = 1;
          $scope.myImage6 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    angular
      .element(document.querySelector("#fileInput3"))
      .on("change", handleFileSelect3);
    angular
      .element(document.querySelector("#fileInput4"))
      .on("change", handleFileSelect4);
    angular
      .element(document.querySelector("#fileInput5"))
      .on("change", handleFileSelect5);
    angular
      .element(document.querySelector("#fileInput6"))
      .on("change", handleFileSelect6);
    //--------------------------------------------
    $scope.showimages = function () {
      $http({
        method: "POST",
        url: "/show-images",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.mainimage = response.data.mainimage;
        $scope.cerimg = response.data.cerimg;
        $scope.recimg = response.data.recimg;
        $scope.parimg = response.data.parimg;

        $scope.$watchGroup(
          ["myCroppedImage4", "myCroppedImage5", "myCroppedImage6"],
          function (newValue, oldValue) {
            if (newValue != oldValue) $scope.saveyes = 1;
          }
        );
      });
    };

    $scope.showimages();

    $scope.saveimages = function () {
      $http({
        method: "POST",
        url: "/save-images",
        data: {
          idevent: window.location.pathname.split("/")[2],
          mainimage: $scope.myCroppedImage3,
          cerimg: $scope.myCroppedImage4,
          recimg: $scope.myCroppedImage5,
          parimg: $scope.myCroppedImage6,
          gall: $scope.newGallery,
        },
      }).then(function (response) {
        $scope.url =
          "/website/" + $scope.idevent + "?id=" + new Date().getTime();
        $scope.saveyes = 0;
        $scope.newGallery = [];
        $scope.showimages();
        $scope.showevent();
      });
    };

    //--------------------------------------------
    $scope.newGallery = [];

    $scope.imageUpload = function (event) {
      var files = event.target.files; //FileList object

      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        reader.onload = $scope.imageIsLoaded;
        reader.readAsDataURL(file);
      }
      $scope.saveyes = 1;
    };

    $scope.imageIsLoaded = function (e) {
      $scope.$apply(function () {
        $scope.newGallery.push(e.target.result);
      });
    };

    //--------------------------------------------

    $scope.delphotogallery = function (idphotogallery) {
      $http({
        method: "POST",
        url: "/del-photogallery",
        data: {
          idphoto: idphotogallery,
          idevent: window.location.pathname.split("/")[2],
        },
      }).then(function (response) {
        $scope.url =
          "/website/" + $scope.idevent + "?id=" + new Date().getTime();
        $scope.showevent();
      });
    };
  },
]);

/*
|
| MEALS CONTROLLER
|
*/
sampleApp.controller("MealsCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      //console.log(response);
      if (!response.data.paid) {
        // if(response.data.trail == 1){
        //   //console.log("pass");
        // }else{
        //   $location.path("/pay");
        // }

      }
    });

    $scope.showmeals = function () {
      $http({
        method: "POST",
        url: "/show-meals",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.meals = response.data;
      });
    };

    $scope.showmeals();

    $scope.delmeal = function () {
      $http({
        method: "POST",
        url: "/del-meal",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idmeal: $scope.delid,
        },
      }).then(function (response) {
        Swal.fire({
          title: 'Success',
          text: 'Meal deleted successfully',
          icon: 'success',
          confirmButtonText: 'OK'
        });
        $scope.showmeals();
      });
    };

    $scope.newmeal = function () {
      $http({
        method: "POST",
        url: "/new-meal",
        data: {
          idevent: window.location.pathname.split("/")[2],
          descriptionmeal: $scope.descriptionmeal,
          namemeal: $scope.namemeal,
        },
      }).then(function (response) {
        //console.log(response);
        if (response.data == 1) {
          Swal.fire({
            title: 'Success',
            text: 'Meal added successfully',
            icon: 'success',
            confirmButtonText: 'OK'
          });
        } else {
          Swal.fire({
            title: 'Error',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'OK'
          })
        }
        $scope.showmeals();
      });
    };

    $scope.editmeal = function () {
      $http({
        method: "POST",
        url: "/edit-meal",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idmeal: $scope.editid,
          mealname: $scope.editname,
          mealdescription: $scope.editdescription,
        },
      }).then(function (response) {
        if (response.data == 1) {
          Swal.fire({
            title: 'Success',
            text: 'Meal edited successfully',
            icon: 'success',
            confirmButtonText: 'OK'
          });
          $scope.mealname = "";
          $scope.mealdescription = "";
          $scope.showmeals();
        } else {
          Swal.fire({
            title: 'Error',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    };
  },
]);

sampleApp.controller("MealsCtrlFR", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        // if(response.data.trail == 1){
        //   //console.log("pass");
        // }else{
        //   $location.path("/pay/fr");
        // } 
      }
    });

    $scope.showmeals = function () {
      $http({
        method: "POST",
        url: "/show-meals",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.meals = response.data;
      });
    };

    $scope.showmeals();

    $scope.delmeal = function () {
      $http({
        method: "POST",
        url: "/del-meal",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idmeal: $scope.delid,
        },
      }).then(function (response) {
        $scope.showmeals();
      });
    };

    $scope.newmeal = function () {
      $http({
        method: "POST",
        url: "/new-meal",
        data: {
          idevent: window.location.pathname.split("/")[2],
          descriptionmeal: $scope.descriptionmeal,
          namemeal: $scope.namemeal,
        },
      }).then(function (response) {
        $scope.showmeals();
      });
    };

    $scope.editmeal = function () {
      $http({
        method: "POST",
        url: "/edit-meal",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idmeal: $scope.editid,
          mealname: $scope.editname,
          mealdescription: $scope.editdescription,
        },
      }).then(function (response) {
        $scope.mealname = "";
        $scope.mealdescription = "";
        $scope.showmeals();
      });
    };
  },
]);

/*
|
| GIFT SUGGESTIONS CONTROLLER
|
*/
sampleApp.controller("GiftsuggestionsCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        // if(response.data.trail == 1){
        //   //console.log("pass");
        // }else{
        //   $location.path("/pay");
        // } 
      }
    });

    $scope.showgifts = function () {
      $http({
        method: "POST",
        url: "/show-gifts",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.gifts = response.data;
      });
    };

    $scope.showgifts();

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.transfertype = response.data.transfer_type;
        $scope.transferlink = response.data.transfer_link;
      });
    };

    $scope.showevent();

    $scope.delgift = function () {
      $http({
        method: "POST",
        url: "/del-gift",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idgift: $scope.delid,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Gift deleted successfully",
          confirmButtonText: "OK"
        })
        $scope.showgifts();
      });
    };

    $scope.newgift = function () {
      $http({
        method: "POST",
        url: "/new-gift",
        data: {
          idevent: window.location.pathname.split("/")[2],
          descriptiongift: $scope.descriptiongift,
          namegift: $scope.namegift,
          linkgift: $scope.linkgift,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Gift added successfully",
          confirmButtonText: "OK"
        })
        $scope.showgifts();
      });
    };

    $scope.editgift = function () {
      $http({
        method: "POST",
        url: "/edit-gift",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idgift: $scope.editid,
          giftname: $scope.editname,
          giftdescription: $scope.editdescription,
          giftlink: $scope.editlink,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Gift edit successfully",
          confirmButtonText: "OK"
        })

        $scope.giftname = "";
        $scope.giftdescription = "";
        $scope.giftlink = "";
        $scope.showgifts();
      });
    };

    $scope.savetransfer = function () {
      $http({
        method: "POST",
        url: "/save-transfer",
        data: {
          idevent: window.location.pathname.split("/")[2],
          transfertype: $scope.transfertype,
          transferlink: $scope.transferlink,
        },
      }).then(function (response) {
        console.log(response);
        if (response.data == 1) {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Transfer  successfully",
            confirmButtonText: "OK"
          })
        }
        else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Something went wrong",
            confirmButtonText: "OK"
          })
        }
        $scope.showtransfer = 0;
      });
    };
  },
]);

sampleApp.controller("GiftsuggestionsCtrlFR", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        // if(response.data.trail == 1){
        //   //console.log("pass");
        // }else{
        //   $location.path("/pay/fr");
        // } 
      }
    });

    $scope.showgifts = function () {
      $http({
        method: "POST",
        url: "/show-gifts",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.gifts = response.data;
      });
    };

    $scope.showgifts();

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.transfertype = response.data.transfer_type;
        $scope.transferlink = response.data.transfer_link;
      });
    };

    $scope.showevent();

    $scope.delgift = function () {
      $http({
        method: "POST",
        url: "/del-gift",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idgift: $scope.delid,
        },
      }).then(function (response) {
        $scope.showgifts();
      });
    };

    $scope.newgift = function () {
      $http({
        method: "POST",
        url: "/new-gift",
        data: {
          idevent: window.location.pathname.split("/")[2],
          descriptiongift: $scope.descriptiongift,
          namegift: $scope.namegift,
          linkgift: $scope.linkgift,
        },
      }).then(function (response) {
        $scope.showgifts();
      });
    };

    $scope.editgift = function () {
      $http({
        method: "POST",
        url: "/edit-gift",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idgift: $scope.editid,
          giftname: $scope.editname,
          giftdescription: $scope.editdescription,
          giftlink: $scope.editlink,
        },
      }).then(function (response) {
        $scope.giftname = "";
        $scope.giftdescription = "";
        $scope.giftlink = "";
        $scope.showgifts();
      });
    };

    $scope.savetransfer = function () {
      $http({
        method: "POST",
        url: "/save-transfer",
        data: {
          idevent: window.location.pathname.split("/")[2],
          transfertype: $scope.transfertype,
          transferlink: $scope.transferlink,
        },
      }).then(function (response) {
        $scope.showtransfer = 0;
      });
    };
  },
]);

/*
|
| GUESTLIST CONTROLLER
|
*/
sampleApp.controller("GuestslistCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.paid = 1;
    $scope.leftnav = 0;
    $scope.numselected = 0;
    $scope.eg = [];

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        if (response.data.trail == 1) {
          //console.log("pass");
          $scope.paid = 1;
        } else {
          $location.path("/pay");
          $scope.paid = 0;
        }

      }
    });

    let urlData = window.location.pathname.split("/");
    $scope.guestlist = function () {
      $http({
        method: "POST",
        url: "/show-guests",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        // $scope.guestlistCheckedIn();
        // $scope.guestlistAttending();
        // $scope.guestlistDeclined();
        $scope.guests = response.data;
        $scope.eventID = $scope.guests[0].id_event;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            // $scope.tot++;
            $scope.totm++;
            nm++;
            // $scope.membersNumber++;
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          $scope.membersNumber = $scope.membersNumber + $scope.guests[key].members_number;
          $scope.totg++;
        });
        $scope.tot = $scope.totg + $scope.membersNumber;
      });
    };

    $scope.myfilterCustom = function (guest) {
        // Search text from the input field
        const searchText = $scope.myfilter || '';

        // Helper function to safely check if a property contains the search text
        function containsText(property) {
            return property && property.toLowerCase().includes(searchText.toLowerCase());
        }
      
        // Check if the guest's name matches the search text
        if (containsText(guest.name)) {
            return true;
        }
      
        // Ensure guest.members is defined and is an array before iterating over it
        if (Array.isArray(guest.members)) {
            for (let i = 0; i < guest.members.length; i++) {
                const member = guest.members[i];
                if (containsText(member.name)) {
                    return true;
                }
            }
        }
      
        // If no match found, return false
        return false;
    };
  

    $scope.guestlistDeclined = function () {
      $http({
        method: "POST",
        url: "/show-guests-declined",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        $scope.DeclinedGuest = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            if ($scope.guests[key].members[key2].declined) $scope.membersNumber++;
            if ($scope.guests[key].members[key2].declined) $scope.tot++;
            if ($scope.guests[key].members[key2].declined) $scope.totm++;
            nm++;
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          if ($scope.guests[key].declined) $scope.tot++;
          if ($scope.guests[key].declined) $scope.totg++;
        });
      });
    };
    $scope.guestlistCheckedIn = function () {
      $http({
        method: "POST",
        url: "/show-guests-checked-in",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        $scope.CheckedInGuests = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].checkin) $scope.membersNumber++;
            // if ($scope.guests[key].members[key2].checkin) $scope.tot++;
            if ($scope.guests[key].members[key2].checkin) $scope.totm++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            nm++;
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          // if ($scope.guests[key].checkin) $scope.tot++
          if ($scope.guests[key].declined) $scope.totdeclined++;
          if ($scope.guests[key].checkin) $scope.totg++;
        });
        $scope.tot = $scope.totg + $scope.membersNumber;
      });
    };
    $scope.AtoZ = function (){
      $http({
        method: "POST",
        url: "/show-guests-a-to-z",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        $scope.ConfirmedGuests = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            // if ($scope.guests[key].members[key2].opened == 2) $scope.tot++;
            // if ($scope.guests[key].members[key2].opened == 2) $scope.totm++;
            if ($scope.guests[key].members[key2].opened == 2) $scope.membersNumber++;
            console.log($scope.guests[key].members[key2].opened);
            nm++;

            if (($scope.guests[key].members[key2].checkin == 1 && $scope.guests[key].members[key2].declined == null && ($scope.guests[key].members[key2].id_meal != null || $scope.guests[key].members[key2].opened == 2)) || (($scope.guests[key].members[key2].opened == 2 || $scope.guests[key].members[key2].id_meal != null) && $scope.guests[key].members[key2].declined == null)) {
              $scope.totm++;
            }
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          // if ($scope.guests[key].opened == 2) $scope.tot++;
          // if ($scope.guests[key].opened == 2 && $scope.guests[key].checkin == null) {
          //   $scope.totg++;
          // }
          if (($scope.guests[key].checkin == 1 && $scope.guests[key].declined == null && ($scope.guests[key].id_meal != null || $scope.guests[key].opened == 2)) || (($scope.guests[key].opened == 2 || $scope.guests[key].id_meal != null) && $scope.guests[key].declined == null)) {
            $scope.totg++;
          }

          $scope.tot = $scope.totg + $scope.totm;
        });
      });
    }
    $scope.ZtoA = function (){
      $http({
        method: "POST",
        url: "/show-guests-z-to-a",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        $scope.ConfirmedGuests = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            // if ($scope.guests[key].members[key2].opened == 2) $scope.tot++;
            // if ($scope.guests[key].members[key2].opened == 2) $scope.totm++;
            if ($scope.guests[key].members[key2].opened == 2) $scope.membersNumber++;
            console.log($scope.guests[key].members[key2].opened);
            nm++;

            if (($scope.guests[key].members[key2].checkin == 1 && $scope.guests[key].members[key2].declined == null && ($scope.guests[key].members[key2].id_meal != null || $scope.guests[key].members[key2].opened == 2)) || (($scope.guests[key].members[key2].opened == 2 || $scope.guests[key].members[key2].id_meal != null) && $scope.guests[key].members[key2].declined == null)) {
              $scope.totm++;
            }
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          // if ($scope.guests[key].opened == 2) $scope.tot++;
          // if ($scope.guests[key].opened == 2 && $scope.guests[key].checkin == null) {
          //   $scope.totg++;
          // }
          if (($scope.guests[key].checkin == 1 && $scope.guests[key].declined == null && ($scope.guests[key].id_meal != null || $scope.guests[key].opened == 2)) || (($scope.guests[key].opened == 2 || $scope.guests[key].id_meal != null) && $scope.guests[key].declined == null)) {
            $scope.totg++;
          }

          $scope.tot = $scope.totg + $scope.totm;
        });
      });
    }
    $scope.guestlistAttending = function () {
      $http({
        method: "POST",
        url: "/show-guests-attending",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        console.log("guests", $scope.guests);
        $scope.ConfirmedGuests = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            // if ($scope.guests[key].members[key2].opened == 2) $scope.tot++;
            // if ($scope.guests[key].members[key2].opened == 2) $scope.totm++;
            if ($scope.guests[key].members[key2].opened == 2) $scope.membersNumber++;
            console.log($scope.guests[key].members[key2].opened);
            nm++;

            if (($scope.guests[key].members[key2].checkin == 1 && $scope.guests[key].members[key2].declined == null && ($scope.guests[key].members[key2].id_meal != null || $scope.guests[key].members[key2].opened == 2)) || (($scope.guests[key].members[key2].opened == 2 || $scope.guests[key].members[key2].id_meal != null) && $scope.guests[key].members[key2].declined == null)) {
              $scope.totm++;
            }
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          // if ($scope.guests[key].opened == 2) $scope.tot++;
          // if ($scope.guests[key].opened == 2 && $scope.guests[key].checkin == null) {
          //   $scope.totg++;
          // }
          if (($scope.guests[key].checkin == 1 && $scope.guests[key].declined == null && ($scope.guests[key].id_meal != null || $scope.guests[key].opened == 2)) || (($scope.guests[key].opened == 2 || $scope.guests[key].id_meal != null) && $scope.guests[key].declined == null)) {
            $scope.totg++;
          }

          $scope.tot = $scope.totg + $scope.totm;
        });
      });
    };

    $scope.guestlistNotConfirm = function () {
      $http({
        method: "POST",
        url: "/show-guests-notconfirm",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            $scope.tot++;
            $scope.totm++;
            nm++;
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          $scope.tot++;
          $scope.totg++;
          $scope.membersNumber = $scope.membersNumber + $scope.guests[key].members_number;
        });
      });
    };

    $scope.guestlistNotOpen = function () {
      $http({
        method: "POST",
        url: "/show-guests-notopen",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            if ($scope.guests[key].members[key2].opened == null) $scope.tot++;
            if ($scope.guests[key].members[key2].opened == null) $scope.totm++;
            if ($scope.guests[key].members[key2].opened == null) $scope.membersNumber++;
            nm++;
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          if ($scope.guests[key].opened == null) $scope.tot++;
          if ($scope.guests[key].opened == null) $scope.totg++;
        });
      });
    };
    $scope.guestlistOpened = function () {
      $http({
        method: "POST",
        url: "/show-guests-opened",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
        $scope.tot = 0;
        $scope.totm = 0;
        $scope.totg = 0;
        $scope.totcheckedin = 0;
        $scope.totdeclined = 0;
        $scope.totattending = 0;
        $scope.membersNumber = 0;
        angular.forEach($scope.guests, function (value, key) {
          var nm = 0;
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].checkin) $scope.totcheckedin++;
            if ($scope.guests[key].members[key2].declined) $scope.totdeclined++;
            if ($scope.guests[key].members[key2].opened == null) $scope.tot++;
            if ($scope.guests[key].members[key2].opened == null) $scope.totm++;
            if ($scope.guests[key].members[key2].opened == null) $scope.membersNumber++;
            nm++;
          });
          $scope.guests[key].nummembers = nm;
          if ($scope.guests[key].checkin) $scope.totcheckedin++;
          if ($scope.guests[key].declined) $scope.totdeclined++;
          if ($scope.guests[key].opened == null) $scope.tot++;
          if ($scope.guests[key].opened == null) $scope.totg++;
        });
      });
    };

    $scope.exportall = function () {
      var currentDate = new Date();
      var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
      var filename = `all_guest_list_${formattedDate}.csv`;

      var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";
      $scope.guests.forEach(function (guest) {
        console.log("guest", guest);
        var status;
        var mealName;
        var title;
        var table;
        var nameParts = guest.name ? guest.name.split(" ") : [];
        var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
        var name = nameParts.join(" ") || "-";

        if (guest.opened == 2) status = "Confirmed";
        else if (guest.declined == 1) status = "Declined";
        else if (guest.checkin == 1) status = "Checked-in";
        else status = "-";
        table = guest.table ? guest.table.number : "-";
        mealName = guest.meal ? guest.meal.name : "-";
        title = guest.titleGuest ? guest.titleGuest : "-";

        csvContent += `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName},${guest.email ?? "-"},${guest.phone ?? "-"},${guest.whatsapp ?? "-"},${mealName},${table},${status}\n`;
        if (guest.members && guest.members.length > 0) {
          csvContent += "MEMBER, , , , , \n";
          guest.members.forEach(function (member) {
            var status;
            var mealName;
            var table;
            var nameParts = member.name ? member.name.split(" ") : [];
            var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
            var name = nameParts.join(" ") || "-";

            if (member.opened == 2) status = "Confirmed";
            else if (member.declined == 1) status = "Declined";
            else if (member.checkin == 1) status = "Checked-in";
            else status = "-";
            table = member.table ? member.table.number : "-";
            mealName = member.meal ? member.meal.name : "-";
            csvContent += `${member.id_guest},${"-"},${name ?? "-"},${familyName ?? "-"},${member.email ?? "-"},${member.phone ?? "-"},${member.whatsapp ?? "-"},${mealName},${table},${status}\n`;
          });
        }
        csvContent += "GUEST, , , , , \n";
      });
      var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
      var url = URL.createObjectURL(blob);
      var link = document.createElement("a");
      link.setAttribute("href", url);
      link.setAttribute("download", filename);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      URL.revokeObjectURL(url);
    };

    $scope.exportconfirmed = function () {
      $scope.guestlistAttending();
      var currentDate = new Date();
      var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
      var filename = `confirmed_guest_list_${formattedDate}.csv`;
      var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";

      setTimeout(function () {
        $scope.ConfirmedGuests.forEach(function (guest) {
          if ((guest.checkin == 1 && guest.declined == null && (guest.id_meal != null || guest.opened == 2)) || ((guest.opened == 2 || guest.id_meal != null) && guest.declined == null)) {
            var status = "Confirmed";
            var mealName = guest.meal ? guest.meal.name : "-";
            var title = guest.titleGuest ? guest.titleGuest : "-";
            var table = guest.table ? guest.table.number : "-";
            var nameParts = guest.name ? guest.name.split(" ") : [];
            var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
            var name = nameParts.join(" ") || "-";

            csvContent += `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName ?? "-"},${guest.email ? guest.email : "-"},${guest.phone ? guest.phone : "-"},${guest.whatsapp ? guest.whatsapp : "-"},${mealName},${table},${status}\n`;
          }
          if (guest.members && guest.members.length > 0) {
            csvContent += "MEMBER, , , , , \n";
            guest.members.forEach(function (member) {
              if ((member.checkin == 1 && member.declined == null && (member.id_meal != null || member.opened == 2)) || ((member.opened == 2 || member.id_meal != null) && member.declined == null)) {
                var status = "Confirmed";
                var mealName = member.meal ? member.meal.name : "-";
                var table = member.table ? member.table.number : "-";
                var nameParts = member.name ? member.name.split(" ") : [];
                var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
                var name = nameParts.join(" ") || "-";
                csvContent += `${member.id_guest},${"-"},${name ?? "-"},${familyName ?? "-"},${member.email ? member.email : "-"},${member.phone ? member.phone : "-"},${member.whatsapp ? member.whatsapp : "-"},${mealName},${table},${status}\n`;
              }
            });
          }
          csvContent += "GUEST, , , , , \n";
        });
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        var url = URL.createObjectURL(blob);
        var link = document.createElement("a");
        link.setAttribute("href", url);
        link.setAttribute("download", filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
      }, 1000);
      $scope.guestlist();
    };


    $scope.exportdeclined = function () {
      $scope.guestlistDeclined();
      var currentDate = new Date();
      var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
      var filename = `declined_guest_list_${formattedDate}.csv`;

      var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";
      setTimeout(function () {

        var print = 0;
        $scope.DeclinedGuest.forEach(function (guest) {
          var mealName = guest.meal ? guest.meal.name : "-";
          var title = guest.titleGuest ? guest.titleGuest : "-";
          var table = guest.table ? guest.table.number : "-";
          var nameParts = guest.name ? guest.name.split(" ") : [];
          var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
          var name = nameParts.join(" ") || "-";

          print = 0;
          if (guest.declined == 1) {
            print = 1;
            var status = "Declined";
            csvContent += `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName ?? "-"},${guest.email ? guest.email : "-"},${guest.phone ? guest.phone : "-"}},${guest.whatsapp ? guest.whatsapp : "-"},${mealName},${table},${status}\n`;
          }

          guest.members.forEach(function (member) {
            if (member.declined === 1) {
              // csvContent += "MEMBER, , , , , \n";
              var status;
              console.log(member);
              var mealName = member.meal ? member.meal.name : "-";
              var table = member.table ? member.table.number : "-";
              var nameParts = member.name ? member.name.split(" ") : [];
              var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
              var name = nameParts.join(" ") || "-";
              if (member.opened == 2) status = "Confirmed";
              else if (member.declined == 1) status = "Declined";
              else if (member.checkin == 1) status = "Checked-in";
              else status = "-";
              csvContent += `${member.id_guest},${"-"},${name ?? "-"},${familyName ?? "-"},${member.email ? member.email : "-"},${member.phone ? member.phone : "-"},${member.whatsapp ? member.whatsapp : "-"},${mealName},${table},${status}\n`;
            }
          });
          if (print == 1) {
            // csvContent += "GUEST, , , , ,\n";
          }
        });

        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        var url = URL.createObjectURL(blob);
        var link = document.createElement("a");
        link.setAttribute("href", url);
        link.setAttribute("download", filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
      }, 1000);
      $scope.guestlist();
    };


    $scope.exportcheckedin = function () {
      $scope.guestlistCheckedIn();
      var currentDate = new Date();
      var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
      var filename = `checkedin_guest_list_${formattedDate}.csv`;
      var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";
      setTimeout(function () {

        $scope.CheckedInGuests.forEach(function (guest) {
          var mealName = guest.meal ? guest.meal.name : "-";
          var title = guest.titleGuest ? guest.titleGuest : "-";
          var table = guest.table ? guest.table.number : "-";
          var nameParts = guest.name ? guest.name.split(" ") : [];
          var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
          var name = nameParts.join(" ") || "-";

          if (guest.checkin == 1) {
            var status = 'Checked-in';
            csvContent += `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName ?? "-"},${guest.email ? guest.email : "-"},${guest.phone ? guest.phone : "-"},${guest.whatsapp ? guest.whatsapp : "-"},${mealName},${table},${status}\n`;
          }

          if (guest.members && guest.members.length > 0) {
            // csvContent += "MEMBER, , , , , \n";
            guest.members.forEach(function (member) {
              var mealName = member.meal ? member.meal.name : "-";
              var table = member.table ? member.table.number : "-";
              var nameParts = member.name ? member.name.split(" ") : [];
              var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
              var name = nameParts.join(" ") || "-";

              if (member.checkin === 1) {
                var status = 'Checked-in';
                csvContent += `${member.id_guest},${"-"},${name ?? "-"},${familyName ?? "-"},${member.email},${member.phone},${member.whatsapp},${mealName},${table},${status}\n`;
              }
            });
          }
          // csvContent += "GUEST, , , , , \n";
        });
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        var url = URL.createObjectURL(blob);
        var link = document.createElement("a");
        link.setAttribute("href", url);
        link.setAttribute("download", filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
      }, 1000);
      $scope.guestlist();
    };

    if (urlData.length > 4) {
      if (urlData[4] == "fr") {
        if (urlData.length > 5) {
          if (urlData[5] == "declined") {
            $scope.guestlistDeclined();
          } else if (urlData[5] == "checked-in") {
            $scope.guestlistCheckedIn();
          } else if (urlData[5] == "attending") {
            $scope.guestlistAttending();
          } else if (urlData[5] == "not-confirm") {
            $scope.guestlistNotConfirm();
          } else if (urlData[5] == "not-open") {
            $scope.guestlistNotOpen();
          }else if (urlData[5] == "a-to-z") {
            $scope.AtoZ();
          }else if (urlData[5] == "z-to-a") {
            $scope.ZtoA();
          }else if (urlData[5] == "opened") {
            $scope.guestlistOpened();
          }
        } else {
          $scope.guestlist();
        }
      } else if (urlData[4] == "declined") {
        $scope.guestlistDeclined();
      } else if (urlData[4] == "checked-in") {
        $scope.guestlistCheckedIn();
      } else if (urlData[4] == "attending") {
        $scope.guestlistAttending();
      } else if (urlData[4] == "not-confirm") {
        $scope.guestlistNotConfirm();
      } else if (urlData[4] == "not-open") {
        $scope.guestlistNotOpen();
      }else if (urlData[4] == "a-to-z") {
        $scope.AtoZ();
      }else if (urlData[4] == "z-to-a") {
        $scope.ZtoA();
      }else if (urlData[4] == "opened") {
        $scope.guestlistOpened();
      }

      //console.log(urlData[4]);
    } else {
      $scope.guestlist();
    }


    $scope.showmeals = function () {
      $http({
        method: "POST",
        url: "/show-meals",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.meals = response.data;
      });
    };
    $scope.showmeals();

    $scope.reset = function () {
      $scope.ng = [];
      $scope.ng.allergiesguest = 0;
      $scope.ng.confirmGuest = 0;
      $scope.nm = [];
      $scope.nm.allergiesmember = 0;
      $scope.eg = [];
      $scope.repeat = 0;
    };

    $scope.selectall = function () {
      $scope.guests
      $scope.numselected = 0;
      angular.forEach($scope.guests, function (value, key) {
        angular.forEach($scope.guests[key].members, function (value2, key2) {
          if (!$scope.sa) {
            $scope.guests[key].members[key2].selected = 1;
            $scope.numselected++;
          } else $scope.guests[key].members[key2].selected = 0;
        });
        if (!$scope.sa) {
          $scope.guests[key].selected = 1;
          $scope.numselected++;
        } else $scope.guests[key].selected = 0;
      });
    };

    $scope.checkrepeat = function () {
      $scope.repeat = 0;
      angular.forEach($scope.guests, function (value, key) {
        angular.forEach($scope.guests[key].members, function (value2, key2) {
          if (
            $scope.guests[key].members[key2].id_guest != $scope.eg.idguest &&
            (($scope.guests[key].members[key2].name == $scope.ng.nameguest &&
              $scope.guests[key].members[key2].name) ||
              ($scope.guests[key].members[key2].phone == $scope.ng.phoneguest &&
                $scope.guests[key].members[key2].phone) ||
              ($scope.guests[key].members[key2].whatsapp ==
                $scope.ng.whatsappguest &&
                $scope.guests[key].members[key2].whatsapp) ||
              ($scope.guests[key].members[key2].email == $scope.ng.emailguest &&
                $scope.guests[key].members[key2].email) ||
              ($scope.guests[key].members[key2].name == $scope.nm.namemember &&
                $scope.guests[key].members[key2].name) ||
              ($scope.guests[key].members[key2].phone ==
                $scope.nm.phonemember &&
                $scope.guests[key].members[key2].phone) ||
              ($scope.guests[key].members[key2].whatsapp ==
                $scope.nm.whatsappmember &&
                $scope.guests[key].members[key2].whatsapp) ||
              ($scope.guests[key].members[key2].email ==
                $scope.nm.emailmember &&
                $scope.guests[key].members[key2].email) ||
              ($scope.guests[key].members[key2].name == $scope.eg.nameguest &&
                $scope.guests[key].members[key2].name) ||
              ($scope.guests[key].members[key2].phone == $scope.eg.phoneguest &&
                $scope.guests[key].members[key2].phone) ||
              ($scope.guests[key].members[key2].whatsapp ==
                $scope.eg.whatsappguest &&
                $scope.guests[key].members[key2].whatsapp) ||
              ($scope.guests[key].members[key2].email == $scope.eg.emailguest &&
                $scope.guests[key].members[key2].email))
          )
            $scope.repeat = 1;
        });

        if (
          $scope.guests[key].id_guest != $scope.eg.idguest &&
          (($scope.guests[key].name == $scope.ng.nameguest &&
            $scope.guests[key].name) ||
            ($scope.guests[key].phone == $scope.ng.phoneguest &&
              $scope.guests[key].phone) ||
            ($scope.guests[key].whatsapp == $scope.ng.whatsappguest &&
              $scope.guests[key].whatsapp) ||
            ($scope.guests[key].email == $scope.ng.emailguest &&
              $scope.guests[key].email) ||
            ($scope.guests[key].name == $scope.nm.namemember &&
              $scope.guests[key].name) ||
            ($scope.guests[key].phone == $scope.nm.phonemember &&
              $scope.guests[key].phone) ||
            ($scope.guests[key].whatsapp == $scope.nm.whatsappmember &&
              $scope.guests[key].whatsapp) ||
            ($scope.guests[key].email == $scope.nm.emailmember &&
              $scope.guests[key].email) ||
            ($scope.guests[key].name == $scope.eg.nameguest &&
              $scope.guests[key].name) ||
            ($scope.guests[key].phone == $scope.eg.phoneguest &&
              $scope.guests[key].phone) ||
            ($scope.guests[key].whatsapp == $scope.eg.whatsappguest &&
              $scope.guests[key].whatsapp) ||
            ($scope.guests[key].email == $scope.eg.emailguest &&
              $scope.guests[key].email))
        )
          $scope.repeat = 1;
      });
    };

    $scope.newguest = function () {
      console.log($scope.ng.confirmGuest)
      if ($scope.ng.emailguest == undefined && $scope.ng.phoneguest == undefined && $scope.ng.whatsappguest == undefined) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please fill at least one them (Email, Phone, WhatsApp)",
        });
        return;
      }

      $http({
        method: "POST",
        url: "/new-guest",
        data: {
          idevent: window.location.pathname.split("/")[2],
          titleGuest: $scope.ng.titleGuest,
          nameguest: $scope.ng.nameguest,
          emailguest: $scope.ng.emailguest || "",
          phoneguest: $scope.ng.phoneguest || "",
          whatsappguest: $scope.ng.whatsappguest || "",
          membernumberguest: $scope.ng.membernumberguest,
          // notesguest: $scope.ng.notesguest,
          allergiesguest: $scope.ng.allergiesguest,
          confirmGuest: $scope.ng.confirmGuest,
          idmealguest: $scope.ng.idmealguest,
          mainguest: 1,
          parentidguest: "",
        },
      }).then(function (response) {
        if (response.data == '1') {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Guest edit successfully",
            confirmButtonText: "OK"
          })
          $('#newguestModal').modal('hide');
        } else if (response.data == '0') {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Something went wrong",
          })
        }
      })
      $scope.ng = [];
      $scope.guestlist();
    };

    //Member Add
    $scope.newmember = function () {
      $http({
        method: "POST",
        url: "/new-guest",
        data: {
          idevent: window.location.pathname.split("/")[2],
          titleGuest: $scope.nm.titleGuest,
          nameguest: $scope.nm.namemember,
          emailguest: $scope.nm.emailmember || "",
          phoneguest: $scope.nm.phonemember || "",
          whatsappguest: $scope.nm.whatsappmember || "",
          membernumberguest: 0,
          // notesguest: $scope.nm.notesmember,
          mainguest: 0,
          allergiesguest: $scope.nm.allergiesmember,
          idmealguest: $scope.nm.idmealmember,
          parentidguest: $scope.editmemberid,
        },
      }).then(function (response) {
        console.log(response)
        if (response.data == '1') {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Guest edit successfully",
            confirmButtonText: "OK"
          })
        } else if (response.data == '0') {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Something went wrong",
          })
        }
      })
      $scope.nm = [];
      $scope.guestlist();

    };


    $scope.editguest = function () {
      $http({
        method: "POST",
        url: "/edit-guest",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idguest: $scope.eg.idguest,
          titleGuest: $scope.eg.titleGuest,
          nameguest: $scope.eg.nameguest,
          emailguest: $scope.eg.emailguest,
          membernumberguest: $scope.eg.membernumberguest,
          phoneguest: $scope.eg.phoneguest,
          whatsappguest: $scope.eg.whatsappguest,
          notesguest: $scope.eg.notesguest,
          allergiesguest: $scope.eg.allergiesguest,
          confirmGuest: $scope.eg.confirmGuest,
          idmealguest: $scope.eg.idmealguest,
        },
      }).then(function (response) {
        console.log(response)
        if (response.data == '1') {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Guest edit successfully",
            confirmButtonText: "OK"
          })
          window.location.reload();
        } else if (response.data == '0') {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Something went wrong",
          })
        }
      })


      // angular.forEach($scope.guests, function (value, key) {
      //   angular.forEach($scope.guests[key].members, function (value2, key2) {
      //     $scope.guests[key].members[key2].selected = 0;
      //   });
      //   $scope.guests[key].selected = 0;
      // });
      // $scope.numselected = 0;
      // $scope.eg = [];
      // $scope.guestlist();

      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1) {
          var ForEdit = $scope.guests[key];
          ForEdit.titleGuest = $scope.eg.titleGuest;
          ForEdit.email = $scope.eg.emailguest;
          ForEdit.name = $scope.eg.nameguest;
          ForEdit.phone = $scope.eg.phoneguest;
          ForEdit.whatsapp = $scope.eg.whatsappguest;
          ForEdit.notes = $scope.eg.notesguest;
          ForEdit.allergies = $scope.eg.allergiesguest;
          ForEdit.confirmGuest = $scope.eg.confirmGuest;
          ForEdit.id_meal = $scope.eg.idmealguest;
          ForEdit.members_number = $scope.eg.membernumberguest;
        } else {
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].selected == 1) {
              var ForEdit = $scope.guests[key].members[key2];
              ForEdit.titleGuest = $scope.eg.titleGuest;
              ForEdit.email = $scope.eg.emailguest;
              ForEdit.name = $scope.eg.nameguest;
              ForEdit.phone = $scope.eg.phoneguest;
              ForEdit.whatsapp = $scope.eg.whatsappguest;
              ForEdit.notes = $scope.eg.notesguest;
              ForEdit.allergies = $scope.eg.allergiesguest;
              ForEdit.confirmGuest = $scope.eg.confirmGuest;
              ForEdit.id_meal = $scope.eg.idmealguest;
              ForEdit.members_number = $scope.eg.membernumberguest;
            }
          });
        }
      });


      // var guestToEdit = $scope.guests.find(function (guest) {
      //   return guest.id_guest === $scope.eg.idguest;
      // });

      // if (guestToEdit) {
      //   guestToEdit.email = $scope.eg.emailguest;
      //   guestToEdit.name = $scope.eg.nameguest;
      //   guestToEdit.phone = $scope.eg.phoneguest;
      //   guestToEdit.whatsapp = $scope.eg.whatsappguest;
      //   guestToEdit.notes = $scope.eg.notesguest;
      //   guestToEdit.allergies = $scope.eg.allergiesguest;
      //   guestToEdit.id_meal = $scope.eg.idmealguest;
      //   guestToEdit.members_number = $scope.eg.membernumberguest;
      // }

      if ($scope.eg.emailguest != '' && $scope.eg.emailguest != null && $scope.eg.phoneguest != '' && $scope.eg.whatsappguest != '') {
        $('#sendModal').modal('show');
      }


    };

    $scope.checkFields = function () {
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1) {
          console.log($scope.guests[key]);
          if ($scope.guests[key].email != '' || $scope.guests[key].phone != '' || $scope.guests[key].whatsapp != '') {
            // $("#sendModal").modal("show");
            $('#selectOptionModal').modal('show');
          } else {
            $scope.reset();
            $scope.idguestedit();
            $("#editguestModal2").modal("show");
          }
        }

        else {
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].selected == 1) {
              if ($scope.guests[key].members[key2].email != "" || $scope.guests[key].members[key2].phone != "" || $scope.guests[key].members[key2].whatsapp != "") {
                // $("#sendModal").modal("show");
                $('#selectOptionModal').modal('show');
              } else {
                $scope.reset();
                $scope.idguestedit();
                $("#editguestModal2").modal("show");
              }
            }
          });
        }
      });
    };

    $scope.saveOptions = function () {
      var guests_ids = [];

      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1) {
          guests_ids.push($scope.guests[key].id_guest);
        }
        else {
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].selected == 1) {
              guests_ids.push($scope.guests[key].members[key2].id_guest);
            }
          });
        }
      });

      console.log(guests_ids);

        $http({
          method: "POST",
          url: "/save-options",
          data: {
            idevent: window.location.pathname.split("/")[2],
            guests_ids: guests_ids,
            gift: $scope.gift,
            checkin: $scope.checkin,
            photos: $scope.photos,
            website: $scope.website,
            rsp: $scope.rsp
          },
        }).then(function (response) {
          console.log("success", response);
          $("#selectOptionModal").modal("hide");
          $("#sendModal").modal("show");
        });
    }

    $scope.openOptionModal = function () {
      $('#selectOptionModal').modal('show');
    }
    $scope.closeOptionModal = function () {
      $('#selectOptionModal').modal('hide');
    }
  

    $scope.checkFieldsForMultiple = function () {
      var allFieldsFilled = true;

      angular.forEach($scope.guests, function (guest) {
        if (guest.selected == 1) {
          var guestFilled = guest.email || guest.phone || guest.whatsapp;
          if (!guestFilled) {
            allFieldsFilled = false;
            return; // Break out of the loop if any guest doesn't have filled fields
          }
        }

        angular.forEach(guest.members, function (member) {
          if (member.selected == 1) {
            var memberFilled = member.email || member.phone || member.whatsapp;
            if (!memberFilled) {
              allFieldsFilled = false;
              return; // Break out of the loop if any member doesn't have filled fields
            }
          }
        });
      });

      if (allFieldsFilled) {
        // $("#sendModal").modal("show");
        $('#selectOptionModal').modal('show');
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please ensure all selected guests and members have at least one filled field!',
          confirmButtonText: 'OK'
        });
      }
    };


    $scope.select = function (guest) {
      if ($scope.numselected == 0) {
        $scope.decly = 0;
        $scope.decln = 0;
      }
      if (guest.selected == 1) {
        $scope.numselected--;
        guest.selected = 0;
      } else {
        $scope.numselected++;
        guest.selected = 1;
        if (guest.declined) {
          $scope.decln = 1;
          $scope.decly = 0;
        } else {
          $scope.decly = 1;
          $scope.decln = 0;
        }
      }
    };

    $scope.iselect = function (guest) {
      if (guest.selected == 1) {
        guest.selected = 0;
      } else {
        guest.selected = 1;
      }
    };

    $scope.idguestedit = function () {
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1) {
          $scope.eg.titleGuest = $scope.guests[key].titleGuest;
          $scope.eg.nameguest = $scope.guests[key].name;
          $scope.eg.emailguest = $scope.guests[key].email;
          $scope.eg.phoneguest = $scope.guests[key].phone;
          $scope.eg.whatsappguest = $scope.guests[key].whatsapp;
          $scope.eg.notesguest = $scope.guests[key].notes;
          $scope.eg.allergiesguest = $scope.guests[key].allergies;
          $scope.eg.confirmGuest = $scope.guests[key].opened;
          $scope.eg.idmealguest = $scope.guests[key].id_meal;
          $scope.eg.membernumberguest = $scope.guests[key].members_number;
          $scope.eg.parentidguest = $scope.guests[key].parent_id_guest;
          $scope.eg.idguest = $scope.guests[key].id_guest;
        } else {
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].selected == 1) {
              $scope.eg.titleGuest = $scope.guests[key].members[key2].titleGuest;
              $scope.eg.nameguest = $scope.guests[key].members[key2].name;
              $scope.eg.emailguest = $scope.guests[key].members[key2].email;
              $scope.eg.phoneguest = $scope.guests[key].members[key2].phone;
              $scope.eg.whatsappguest =
                $scope.guests[key].members[key2].whatsapp;
              $scope.eg.notesguest = $scope.guests[key].members[key2].notes;
              $scope.eg.allergiesguest =
                $scope.guests[key].members[key2].allergies;
              $scope.eg.confirmGuest = $scope.guests[key].members[key2].opened;
              $scope.eg.idmealguest = $scope.guests[key].members[key2].id_meal;
              $scope.eg.membernumberguest =
                $scope.guests[key].members[key2].members_number;
              $scope.eg.parentidguest =
                $scope.guests[key].members[key2].parent_id_guest;
              $scope.eg.idguest = $scope.guests[key].members[key2].id_guest;
            }
          });
        }
      });
    };

    $scope.guestsdel = function () {
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1) {
          $http({
            method: "POST",
            url: "/del-guest",
            data: {
              idevent: window.location.pathname.split("/")[2],
              guestid: $scope.guests[key].id_guest,
            },
          }).then(function () {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Guest deleted successfully",
              confirmButtonText: "OK"
            })
            $scope.guestlist();
          });
        } else {
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            if ($scope.guests[key].members[key2].selected == 1) {
              $http({
                method: "POST",
                url: "/del-guest",
                data: {
                  idevent: window.location.pathname.split("/")[2],
                  guestid: $scope.guests[key].members[key2].id_guest,
                },
              }).then(function () {
                Swal.fire({
                  icon: "success",
                  title: "Success",
                  text: "Guest deleted successfully",
                  confirmButtonText: "OK"
                })
                $scope.guestlist();
              });
            }
            $scope.guests[key].members[key2].selected = 0;
          });
        }
        $scope.guests[key].selected = 0;
      });
      $scope.numselected = 0;
    };

    $scope.guestsdecline = function () {
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1) {
          $http({
            method: "POST",
            url: "/decline-guest",
            data: {
              idevent: window.location.pathname.split("/")[2],
              guestid: $scope.guests[key].id_guest,
            },
          }).then(function () {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Guest declined successfully",
              confirmButtonText: "OK"
            })
            $scope.guestlist();
          });
        }

        angular.forEach($scope.guests[key].members, function (value2, key2) {
          if ($scope.guests[key].members[key2].selected == 1) {
            $http({
              method: "POST",
              url: "/decline-guest",
              data: {
                idevent: window.location.pathname.split("/")[2],
                guestid: $scope.guests[key].members[key2].id_guest,
              },
            }).then(function () {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: "Guest declined successfully",
                confirmButtonText: "OK"
              })
              $scope.guestlist();
            });
          }
          $scope.guests[key].members[key2].selected = 0;
        });

        $scope.guests[key].selected = 0;
      });
      $scope.numselected = 0;
    };

    $scope.guestsundecline = function () {
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1) {
          $http({
            method: "POST",
            url: "/undecline-guest",
            data: {
              idevent: window.location.pathname.split("/")[2],
              guestid: $scope.guests[key].id_guest,
            },
          }).then(function () {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Guest undeclined successfully",
              confirmButtonText: "OK"
            })
            $scope.guestlist();
          });
        }

        angular.forEach($scope.guests[key].members, function (value2, key2) {
          if ($scope.guests[key].members[key2].selected == 1) {
            $http({
              method: "POST",
              url: "/undecline-guest",
              data: {
                idevent: window.location.pathname.split("/")[2],
                guestid: $scope.guests[key].members[key2].id_guest,
              },
            }).then(function () {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: "Guest undeclined successfully",
                confirmButtonText: "OK"
              })
              $scope.guestlist();
            });
          }
          $scope.guests[key].members[key2].selected = 0;
        });

        $scope.guests[key].selected = 0;
      });
      $scope.numselected = 0;
    };

    $http({
      method: "POST",
      url: "/all-guests",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      $scope.allguests = response.data;
    });

    $scope.importfromoe = function () {
      $http({
        method: "POST",
        url: "/importfoe",
        data: {
          idevent: window.location.pathname.split("/")[2],
          allguests: $scope.allguests,
        },
      }).then(function (response) {
        $scope.guestlist();
      });
    };

    $scope.readcsv = function (mycsv) {
      var selectfile = mycsv.files[0];
      r = new FileReader();
      r.onloadend = function (e) {
        //debugger;
        var contents = e.target.result;

        const lines = contents.split("\n");
        $scope.risultato = [];
        const headers = lines[0].split(";");

        for (let i = 1; i < lines.length; i++) {
          if (!lines[i]) continue;
          const obj = {};
          const currentline = lines[i].split(";");

          for (let j = 0; j < headers.length; j++) {
            obj[headers[j]] = currentline[j];
          }
          $scope.risultato.push(obj);
        }
        ////console.log($scope.risultato);
      };
      r.readAsBinaryString(selectfile);
    };

    $scope.importfromcsv = function () {
      $http({
        method: "POST",
        url: "/importfcsv",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: $scope.risultato,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Import csv successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
      });
    };

    $scope.send = function () {
      $scope.sendelems = [];
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].selected == 1)
          $scope.sendelems.push($scope.guests[key]);
        angular.forEach($scope.guests[key].members, function (value2, key2) {
          if ($scope.guests[key].members[key2].selected == 1)
            $scope.sendelems.push($scope.guests[key].members[key2]);
        });
      });

      $http({
        method: "POST",
        url: "/send-invitations",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: $scope.sendelems,
          email: $scope.emailcheck,
          sms: $scope.smscheck,
          whatsapp: $scope.whatsappcheck,
        },
      }).then(function (response) {
        $scope.guestlist();
        if ($scope.emailcheck == 1 || $scope.smscheck == 1 || $scope.whatsappcheck == 1) {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Invitations sent successfully",
            confirmButtonText: "OK"
          })
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops",
            text: "Please select at least one option",
            confirmButtonText: "OK"
          });
        }
        angular.forEach($scope.guests, function (value, key) {
          angular.forEach($scope.guests[key].members, function (value2, key2) {
            $scope.guests[key].members[key2].selected = 0;
          });
          $scope.guests[key].selected = 0;
        });
        $scope.numselected = 0;
        $scope.guestlist();
        $scope.emailcheck = 0;
        $scope.smscheck = 0;
        $scope.whatsappcheck = 0;
        $scope.sendelems = [];
      });
    };
  },
]);

/*
|
| INVITATION CONTROLLER
|
*/
sampleApp.controller("InvitationCtrl", [
  "$scope",
  "textAngularManager",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    textAngularManager,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;
    $scope.idevent = window.location.pathname.split("/")[2];
    $scope.saveyes = 0;

    $scope.myImage1 = "";
    $scope.myCroppedImageInvitation = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $scope.orightml = "";
    $scope.htmlcontent = $scope.orightml;
    $scope.disabled = false;

    $scope.loadiframe = function () {
      $scope.url = "/mail-invitation/fake/" + $scope.idevent;
    };

    $scope.loadiframe();

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.htmlcontent = response.data["ititle"];
        $scope.htmlcontent2 = response.data["isubtitle"];
        $scope.htmlcontent3 = response.data["itext"];

        $scope.$watchGroup(
          [
            "myCroppedImageInvitation",
            "htmlcontent",
            "htmlcontent2",
            "htmlcontent3",
          ],
          function (newValue, oldValue) {
            if (newValue != oldValue) $scope.saveyes = 1;
          }
        );
      });
    };

    $scope.showevent();

    $scope.saveall = function () {
      $http({
        method: "POST",
        url: "/edit-eventmail",
        data: {
          idevent: window.location.pathname.split("/")[2],
          ititle: $scope.htmlcontent,
          isubtitle: $scope.htmlcontent2,
          itext: $scope.htmlcontent3,
          type: "invitation",
          photo: $scope.myCroppedImageInvitation,
        },
      }).then(function (response) {
        if (response.data == 1) {
          $scope.saveyes = 0;
          $scope.url =
            "/mail-invitation/33/" +
            $scope.idevent +
            "?id=" +
            new Date().getTime();
        }
      });
    };

    $scope.test = function () {
      $http({
        method: "POST",
        url: "/test-invitation",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) { });
    };

    var handleFileSelect1 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.photook = 1;
          $scope.myImage1 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };
    angular
      .element(document.querySelector("#fileInput1"))
      .on("change", handleFileSelect1);
  },
]);


sampleApp.controller("InvitationCtrlNew", [
  "$scope",
  "textAngularManager",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    textAngularManager,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;
    $scope.idevent = window.location.pathname.split("/")[2];
    $scope.saveyes = 0;

    $scope.myImage1 = "";
    $scope.myCroppedImageInvitation = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $scope.orightml = "";
    $scope.htmlcontent = $scope.orightml;
    $scope.disabled = false;

    $scope.loadiframe = function () {
      $scope.url = "/mail-invitation/fake/" + $scope.idevent;
    };

    $scope.loadiframe();

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.htmlcontent = response.data["ititle"];
        $scope.htmlcontent2 = response.data["isubtitle"];
        $scope.htmlcontent3 = response.data["itext"];

        $scope.$watchGroup(
          [
            "myCroppedImageInvitation",
            "htmlcontent",
            "htmlcontent2",
            "htmlcontent3",
          ],
          function (newValue, oldValue) {
            if (newValue != oldValue) $scope.saveyes = 1;
          }
        );
      });
    };

    $scope.showevent();

    $scope.saveall = function () {
      $http({
        method: "POST",
        url: "/edit-eventmail",
        data: {
          idevent: window.location.pathname.split("/")[2],
          ititle: $scope.htmlcontent,
          isubtitle: $scope.htmlcontent2,
          itext: $scope.htmlcontent3,
          type: "invitation",
          photo: $scope.myCroppedImageInvitation,
        },
      }).then(function (response) {
        if (response.data == 1) {
          $scope.saveyes = 0;
          $scope.url =
            "/mail-invitation/33/" +
            $scope.idevent +
            "?id=" +
            new Date().getTime();
        }
      });
    };

    $scope.test = function () {
      $http({
        method: "POST",
        url: "/test-invitation",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) { });
    };

    var handleFileSelect1 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.photook = 1;
          $scope.myImage1 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };
    angular
      .element(document.querySelector("#fileInput1"))
      .on("change", handleFileSelect1);
  },
]);

/*
|
| GUEST TABLES CONTROLLER
|
*/
sampleApp.controller("GueststablesCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;
    $scope.saveyes = 0;

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      // console.log(response);
      if (response.data.type != "CORPORATE") {
        document.getElementById('BtnsBox').style.display = "none";
      }
      $scope.guestCanSelectSeats = response.data.guestCanSelectSeats;
      // $scope.eventId = response.data.id_event;
      const canSelectSeatsRadio = $("#can-select-seats");
      const canNotSelectSeatsRadio = $("#can-not-select-seats");
      if ($scope.guestCanSelectSeats === 1) {
        canNotSelectSeatsRadio.prop("checked", true);
      } else {
        canSelectSeatsRadio.prop("checked", true);
      }


      if (!response.data.paid) {
        if (response.data.trail == 1) {
          //console.log("pass");
        } else {
          $location.path("/pay");
        }
      }
      $scope.isCorporate = response.data.isCorporate;

    });

    $scope.ev = window.location.pathname.split("/")[2];

    $scope.myImagePlan = "";
    $scope.myCroppedImagePlan = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      $scope.imgplan = response.data.imgplan;

      $scope.$watchGroup(["myCroppedImagePlan"], function (newValue, oldValue) {
        if (newValue != oldValue) $scope.saveyes = 1;
      });
    });

    $scope.saveall = function () {
      $http({
        method: "POST",
        url: "/edit-plan",
        data: {
          idevent: window.location.pathname.split("/")[2],
          imgplan: $scope.myCroppedImagePlan,
        },
      }).then(function (response) {
        if (response.data == 1) $scope.saveyes = 0;
      });
    };

    var handleFileSelect1 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.planok = 1;
          $scope.myImagePlan = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    angular
      .element(document.querySelector("#fileInputPlan"))
      .on("change", handleFileSelect1);

    $scope.showtables = function () {
      $http({
        method: "POST",
        url: "/show-tables",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        console.log('here');
        $scope.tables = response.data;
        $scope.tot = 0;
        $scope.totseated = 0;
        angular.forEach($scope.tables, function (value, key) {
          var ng = 0;
          angular.forEach($scope.tables[key].guests, function (value2, key2) {
            ng++;
            $scope.totseated++;
          });
          //console.log("numguest " + ng);
          $scope.tables[key].numguest = ng;
          $scope.tot++;
        });
      });
    };

    $scope.showtables();

    $scope.deltable = function () {
      $http({
        method: "POST",
        url: "/del-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.delid,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Table deleted successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.newtable = function () {
      $http({
        method: "POST",
        url: "/new-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          numbertable: $scope.numbertable,
          nametable: $scope.nametable,
          gnumbertable: $scope.gnumbertable,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Table created successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.edittable = function () {
      $http({
        method: "POST",
        url: "/edit-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.editid,
          tablename: $scope.editname,
          tablenumber: $scope.editnumber,
          tablegnumber: $scope.editnumguest,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Table edit successfully",
          confirmButtonText: "OK"
        })
        $scope.tablename = "";
        $scope.tabledescription = "";
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.addseats = function () {

      $http({
        method: "POST",
        url: "/add-seats-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.editid,
          seatName: $scope.editname,
          tablenumber: $scope.editnumber,
          tablegnumber: $scope.editnumguest,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Seats added successfully",
          confirmButtonText: "OK"
        })
        $scope.tablename = "";
        $scope.tabledescription = "";
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.checkrepeat = function () {
      $scope.repeat = 0;
      angular.forEach($scope.tables, function (value, key) {
        if (
          $scope.tables[key].id_table != $scope.editid &&
          (($scope.tables[key].number == $scope.numbertable &&
            $scope.tables[key].number) ||
            ($scope.tables[key].number == $scope.editnumber &&
              $scope.tables[key].number) ||
            ($scope.tables[key].name == $scope.nametable &&
              $scope.tables[key].name) ||
            ($scope.tables[key].name == $scope.editname &&
              $scope.tables[key].name))
        )
          $scope.repeat = 1;
      });
    };

    $scope.reset = function () {
      $scope.editid = "";
      $scope.editname = "";
      $scope.editnumber = "";
      $scope.editnumguest = "";
      $scope.numbertable = "";
      $scope.nametable = "";
      $scope.gnumbertable = "";
      $scope.repeat = 0;
    };

    $scope.guestlist = function () {
      $http({
        method: "POST",
        url: "/all-guests-not-nested",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
      });
    };
    $scope.guestlist();

    $scope.settables = function () {
      console.log($scope.guests);
      //console.log($scope.editid);
      $http({
        method: "POST",
        url: "/set-tables",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.editid,
          allguests: $scope.guests,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send invitation successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
        $scope.showtables();
      });
    };

    $scope.getMainGuestName = function(parent_id_guest) {
      var mainGuest = $scope.guests.find(g => g.id_guest == parent_id_guest);
      return mainGuest ? mainGuest.name : 'Unknown';
  };
  

  $scope.filterGuests = function(guest) {
    return guest.id_meal == '0' || guest.id_meal == null;
};
  
    $scope.sendMealEmail = function () {
      console.log("Run sendMealEmail");
      var withoutMealGuests = [];

      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].id_meal == 0 || $scope.guests[key].id_meal == null) {
          if($scope.guests[key].mainguest == 0){
            withoutMealGuests.push($scope.guests[key].parent_id_guest);
          }else{
            withoutMealGuests.push($scope.guests[key].id_guest);
          }
        }
      });

      const uniqueIds = [...new Set(withoutMealGuests)];
      console.log(uniqueIds);

      $http({
        method: "POST",
        url: "/send-meal-invitations",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: uniqueIds,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send invitation successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
        $scope.showtables();
      });
    }

    // Custom filter function
    $scope.customFilter = function(guest) {
      if (!$scope.search) return true; // If no search term, show all guests

      let searchTerm = $scope.search.toLowerCase();

      // Helper function to safely get the lowercase string
      function safeToLowerCase(value) {
          return value ? value.toString().toLowerCase() : '';
      }

      // Check if the guest matches the search term
      let matchesGuest = safeToLowerCase(guest.name).includes(searchTerm) || 
                        //  safeToLowerCase(guest.mealName).includes(searchTerm) ||
                         safeToLowerCase(guest.id_guest).includes(searchTerm) ||
                         safeToLowerCase(guest.parent_id_guest).includes(searchTerm);

      if (matchesGuest) return true;

      // Check if the guest's parent matches the search term
      let parent = $scope.guests.find(g => g.id_guest === guest.parent_id_guest);
      if (parent && (safeToLowerCase(parent.name).includes(searchTerm) || 
                     safeToLowerCase(parent.mealName).includes(searchTerm) ||
                     safeToLowerCase(parent.id_guest).includes(searchTerm))) {
          return true;
      }

      return false;
  };

    $scope.setg = function () {
      angular.forEach($scope.guests, function (value, key) {
        $scope.guests[key].selected = 0;
      });
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].id_table == $scope.editid)
          $scope.guests[key].selected = 1;
      });
    };

    $scope.setTableID = function (tableID, seatID) {
      //console.log(tableID);
      document.getElementById('tableID').value = tableID;
      document.getElementById('seatID').value = seatID;
    }

    $scope.removeGuest = function (tableID, guestID) {
      //console.log("table: " + tableID);
      //console.log("table: " + guestID);

      $http({
        method: "POST",
        url: "/remove-guest",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: tableID,
          idGuest: guestID,
        },
      }).then(function (response) {
        //console.log(response);
        $scope.guestlist();
        $scope.showtables();
      });
    }

    $scope.sel = function (g) {
      if (g.selected == 1) {
        g.selected = 0;
        $scope.actualnumguest--;
      } else {
        g.selected = 1;
        $scope.actualnumguest++;
      }
    };
  },
]);

sampleApp.controller("GueststablesCtrlFR", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;
    $scope.saveyes = 0;

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        if (response.data.trail == 1) {
          //console.log("pass");
        } else {
          $location.path("/pay/fr");
        }
      }
      $scope.isCorporate = response.data.isCorporate;
    });

    $scope.ev = window.location.pathname.split("/")[2];

    $scope.myImagePlan = "";
    $scope.myCroppedImagePlan = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      $scope.imgplan = response.data.imgplan;

      $scope.$watchGroup(["myCroppedImagePlan"], function (newValue, oldValue) {
        if (newValue != oldValue) $scope.saveyes = 1;
      });
    });

    $scope.saveall = function () {
      $http({
        method: "POST",
        url: "/edit-plan",
        data: {
          idevent: window.location.pathname.split("/")[2],
          imgplan: $scope.myCroppedImagePlan,
        },
      }).then(function (response) {
        if (response.data == 1) $scope.saveyes = 0;
      });
    };

    var handleFileSelect1 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.planok = 1;
          $scope.myImagePlan = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };

    angular
      .element(document.querySelector("#fileInputPlan"))
      .on("change", handleFileSelect1);

    $scope.showtables = function () {
      $http({
        method: "POST",
        url: "/show-tables",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.tables = response.data;
        $scope.tot = 0;
        $scope.totseated = 0;
        angular.forEach($scope.tables, function (value, key) {
          var ng = 0;
          angular.forEach($scope.tables[key].guests, function (value2, key2) {
            ng++;
            $scope.totseated++;
          });
          //console.log("numguest " + ng);
          $scope.tables[key].numguest = ng;
          $scope.tot++;
        });
      });
    };

    $scope.showtables();

    $scope.deltable = function () {
      $http({
        method: "POST",
        url: "/del-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.delid,
        },
      }).then(function (response) {
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.newtable = function () {
      $http({
        method: "POST",
        url: "/new-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          numbertable: $scope.numbertable,
          nametable: $scope.nametable,
          gnumbertable: $scope.gnumbertable,
        },
      }).then(function (response) {
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.edittable = function () {
      $http({
        method: "POST",
        url: "/edit-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.editid,
          tablename: $scope.editname,
          tablenumber: $scope.editnumber,
          tablegnumber: $scope.editnumguest,
        },
      }).then(function (response) {
        $scope.tablename = "";
        $scope.tabledescription = "";
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.addseats = function () {

      $http({
        method: "POST",
        url: "/add-seats-table",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.editid,
          seatName: $scope.editname,
          tablenumber: $scope.editnumber,
          tablegnumber: $scope.editnumguest,
        },
      }).then(function (response) {
        $scope.tablename = "";
        $scope.tabledescription = "";
        $scope.showtables();
        $scope.guestlist();
      });
    };

    $scope.checkrepeat = function () {
      $scope.repeat = 0;
      angular.forEach($scope.tables, function (value, key) {
        if (
          $scope.tables[key].id_table != $scope.editid &&
          (($scope.tables[key].number == $scope.numbertable &&
            $scope.tables[key].number) ||
            ($scope.tables[key].number == $scope.editnumber &&
              $scope.tables[key].number) ||
            ($scope.tables[key].name == $scope.nametable &&
              $scope.tables[key].name) ||
            ($scope.tables[key].name == $scope.editname &&
              $scope.tables[key].name))
        )
          $scope.repeat = 1;
      });
    };

    $scope.reset = function () {
      $scope.editid = "";
      $scope.editname = "";
      $scope.editnumber = "";
      $scope.editnumguest = "";
      $scope.numbertable = "";
      $scope.nametable = "";
      $scope.gnumbertable = "";
      $scope.repeat = 0;
    };

    $scope.guestlist = function () {
      $http({
        method: "POST",
        url: "/all-guests-not-nested",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
      });
    };
    $scope.guestlist();

    $scope.settables = function () {
      $http({
        method: "POST",
        url: "/set-tables",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: $scope.editid,
          allguests: $scope.guests,
        },
      }).then(function (response) {
        $scope.guestlist();
        $scope.showtables();
      });
    };

    $scope.setg = function () {
      angular.forEach($scope.guests, function (value, key) {
        $scope.guests[key].selected = 0;
      });
      angular.forEach($scope.guests, function (value, key) {
        if ($scope.guests[key].id_table == $scope.editid)
          $scope.guests[key].selected = 1;
      });
    };

    $scope.setTableID = function (tableID, seatID) {
      //console.log(tableID);
      document.getElementById('tableID').value = tableID;
      document.getElementById('seatID').value = seatID;
    }

    $scope.removeGuest = function (tableID, guestID) {
      //console.log("table: " + tableID);
      //console.log("table: " + guestID);

      $http({
        method: "POST",
        url: "/remove-guest",
        data: {
          idevent: window.location.pathname.split("/")[2],
          idtable: tableID,
          idGuest: guestID,
        },
      }).then(function (response) {
        //console.log(response);
        $scope.guestlist();
        $scope.showtables();
      });
    }


    $scope.sel = function (g) {
      if (g.selected == 1) {
        g.selected = 0;
        $scope.actualnumguest--;
      } else {
        g.selected = 1;
        $scope.actualnumguest++;
      }
    };
  },
]);

/*
|
| PHOTOS CONTROLLER
|
*/
sampleApp.controller("PhotosCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.saveyes = 0;

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        if (response.data.trail == 1) {
          //console.log("pass");
        } else {
          $location.path("/pay");
        }
      }
    });

    $scope.openModal = function (imgSrc) {
      var modal = document.getElementById("myModal");
      var modalImg = document.getElementById("img01");
  
      modal.style.display = "block";
      modalImg.src = imgSrc;
  };
  
  $scope.closeModal = function () {
      var modal = document.getElementById("myModal");
      modal.style.display = "none";
  };
  

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.galleries = response.data.photogallery;
        $scope.videogalleries = response.data.videogallery;
        $scope.csrf = response.data.csrfToken;
        document.getElementById('csrf').value = $scope.csrf;
        document.getElementById('csrf2').value = $scope.csrf;
        // document.getElementById('eventId2').value = response.data.id_event;
        // document.getElementById('eventId').value = response.data.id_event;
      });
    };

    $scope.showevent();

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    //--------------------------------------------
    $scope.newGallery = [];

    $scope.imageUpload = function (event) {
      var files = event.target.files; //FileList object

      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        reader.onload = $scope.imageIsLoaded;
        reader.readAsDataURL(file);
      }
      $scope.saveyes = 1;
    };

    $scope.imageIsLoaded = function (e) {
      $scope.$apply(function () {
        $scope.newGallery.push(e.target.result);
      });
    };

    //--------------------------------------------

    $scope.delphotogallery = function (idphotogallery) {
      $http({
        method: "POST",
        url: "/del-photogallery",
        data: {
          idphoto: idphotogallery,
          idevent: window.location.pathname.split("/")[2],
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Photo deleted successfully",
          confirmButtonText: "OK"
        })
        // $scope.guestlist();
        if($scope.guestlist){
          $scope.guestlist();
        }
        $scope.url =
          "/website/" + $scope.idevent + "?id=" + new Date().getTime();
        $scope.showevent();
      });
    };
    $scope.delvideogallery = function (id) {
      $http({
        method: "POST",
        url: "/del-videogallery",
        data: {
          id: id,
          idevent: window.location.pathname.split("/")[2],
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Video deleted successfully",
          confirmButtonText: "OK"
        })
        // $scope.guestlist();
        if($scope.guestlist){
          $scope.guestlist();
        }
        $scope.url =
          "/website/" + $scope.idevent + "?id=" + new Date().getTime();
        $scope.showevent();
      });
    };

    $scope.saveimages = function () {
      $http({
        method: "POST",
        url: "/save-images",
        data: {
          idevent: window.location.pathname.split("/")[2],
          gall: $scope.newGallery,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Photo Uploadd successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
        $scope.saveyes = 0;
        $scope.newGallery = [];
        $scope.showevent();
      });
    };
  },
]);

sampleApp.controller("PhotosCtrlFR", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.saveyes = 0;

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        if (response.data.trail == 1) {
          //console.log("pass");
        } else {
          $location.path("/pay/fr");
        }
      }
    });

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.galleries = response.data.photogallery;
      });
    };

    $scope.showevent();

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    //--------------------------------------------
    $scope.newGallery = [];

    $scope.imageUpload = function (event) {
      var files = event.target.files; //FileList object

      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        reader.onload = $scope.imageIsLoaded;
        reader.readAsDataURL(file);
      }
      $scope.saveyes = 1;
    };

    $scope.imageIsLoaded = function (e) {
      $scope.$apply(function () {
        $scope.newGallery.push(e.target.result);
      });
    };

    //--------------------------------------------

    $scope.delphotogallery = function (idphotogallery) {
      $http({
        method: "POST",
        url: "/del-photogallery",
        data: {
          idphoto: idphotogallery,
          idevent: window.location.pathname.split("/")[2],
        },
      }).then(function (response) {

        $scope.url =
          "/website/" + $scope.idevent + "?id=" + new Date().getTime();
        $scope.showevent();
      });
    };

    $scope.saveimages = function () {
      $http({
        method: "POST",
        url: "/save-images",
        data: {
          idevent: window.location.pathname.split("/")[2],
          gall: $scope.newGallery,
        },
      }).then(function (response) {
        $scope.saveyes = 0;
        $scope.newGallery = [];
        $scope.showevent();
      });
    };
  },
]);

/*
|
| ACKNOWLEDGMENTS CONTROLLER
|
*/
sampleApp.controller("AcknowledgmentsCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;
    $scope.idevent = window.location.pathname.split("/")[2];
    $scope.saveyes = 0;

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        if (response.data.trail == 1) {
          //console.log("pass");
        } else {
          $location.path("/pay");
        }
      }
    });

    $scope.guestlist = function () {
      $http({
        method: "POST",
        url: "/all-guests-not-nested",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
      });
    };
    $scope.guestlist();


    $scope.updateAllEmailSelected = function (selected) {
      for (var i = 0; i < $scope.guests.length; i++) {
        if ($scope.guests[i].email) {
          $scope.guests[i].emailselected = selected ? 1 : 0;
        }
      }
    };

    $scope.$watch('selectAllEmails', function (newVal) {
      if (newVal !== undefined) {
        $scope.updateAllEmailSelected(newVal);
      }
    });
    $scope.updateAllPhoneSelected = function (selected) {
      for (var i = 0; i < $scope.guests.length; i++) {
        if ($scope.guests[i].phone) {
          $scope.guests[i].phoneselected = selected ? 1 : 0;
        }
      }
    };

    $scope.$watch('selectAllPhones', function (newVal) {
      if (newVal !== undefined) {
        $scope.updateAllPhoneSelected(newVal);
      }
    });
    $scope.updateAllWhatsappSelected = function (selected) {
      for (var i = 0; i < $scope.guests.length; i++) {
        if ($scope.guests[i].whatsapp) {
          $scope.guests[i].whatsappselected = selected ? 1 : 0;
        }
      }
    };

    $scope.$watch('selectAllWhatsapps', function (newVal) {
      if (newVal !== undefined) {
        $scope.updateAllWhatsappSelected(newVal);
      }
    });
    $scope.selem = function (g) {
      if (g.emailselected == 1) {
        g.emailselected = 0;
      } else {
        g.emailselected = 1;
      }
    };
    $scope.selph = function (g) {
      if (g.phoneselected == 1) {
        g.phoneselected = 0;
      } else {
        g.phoneselected = 1;
      }
    };
    $scope.selwh = function (g) {
      if (g.whatsappselected == 1) {
        g.whatsappselected = 0;
      } else {
        g.whatsappselected = 1;
      }
    };

    $scope.sendemail = function (guests) {
      $http({
        method: "POST",
        url: "/send-acknowledgement-email",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: guests,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send Email successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
      });
    };
    $scope.sendsms = function (guests) {
      $http({
        method: "POST",
        url: "/send-acknowledgement-sms",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: guests,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send Sms successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
      });
    };
    $scope.sendwhatsapp = function (guests) {
      $http({
        method: "POST",
        url: "/send-acknowledgement-whatsapp",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: guests,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send Whatsapp successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
        //console.log(response.data);
      });
    };

    $scope.myImage1 = "";
    $scope.myCroppedImageAcknowledgment = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $scope.orightml = "";
    $scope.htmlcontent = $scope.orightml;
    $scope.disabled = false;

    $scope.loadiframe = function () {
      $scope.url = "/mail-acknowledgment/fake/" + $scope.idevent;
    };

    $scope.loadiframe();

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.htmlcontent = response.data["atitle"];
        $scope.htmlcontent2 = response.data["asubtitle"];
        $scope.htmlcontent3 = response.data["atext"];

        $scope.$watchGroup(
          [
            "myCroppedImageAcknowledgment",
            "htmlcontent",
            "htmlcontent2",
            "htmlcontent3",
          ],
          function (newValue, oldValue) {
            if (newValue != oldValue) $scope.saveyes = 1;
          }
        );
      });
    };

    $scope.showevent();

    $scope.saveall = function () {
      $http({
        method: "POST",
        url: "/edit-eventmail",
        data: {
          idevent: window.location.pathname.split("/")[2],
          atitle: $scope.htmlcontent,
          asubtitle: $scope.htmlcontent2,
          atext: $scope.htmlcontent3,
          type: "acknowledgment",
          photo: $scope.myCroppedImageAcknowledgment,
        },
      }).then(function (response) {
        if (response.data == 1) {
          $scope.saveyes = 0;
          $scope.url =
            "/mail-acknowledgment/33/" +
            $scope.idevent +
            "?id=" +
            new Date().getTime();
        }
      });
    };

    $scope.test = function () {
      $http({
        method: "POST",
        url: "/test-acknowledgment",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) { });
    };

    var handleFileSelect1 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.photook = 1;
          $scope.myImage1 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };
    angular
      .element(document.querySelector("#fileInput1"))
      .on("change", handleFileSelect1);
  },
]);

sampleApp.controller("AcknowledgmentsCtrlFR", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;
    $scope.idevent = window.location.pathname.split("/")[2];
    $scope.saveyes = 0;

    $http({
      method: "POST",
      url: "/show-event",
      data: { idevent: window.location.pathname.split("/")[2] },
    }).then(function (response) {
      if (!response.data.paid) {
        if (response.data.trail == 1) {
          //console.log("pass");
        } else {
          $location.path("/pay/fr");
        }
      }
    });

    $scope.myImage1 = "";
    $scope.myCroppedImageAcknowledgmentf = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $scope.orightml = "";
    $scope.htmlcontent = $scope.orightml;
    $scope.disabled = false;

    $scope.loadiframe = function () {
      $scope.url = "/mail-acknowledgment/fake/" + $scope.idevent;
    };

    $scope.loadiframe();

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.htmlcontent = response.data["atitle"];
        $scope.htmlcontent2 = response.data["asubtitle"];
        $scope.htmlcontent3 = response.data["atext"];

        $scope.$watchGroup(
          [
            "myCroppedImageAcknowledgmentf",
            "htmlcontent",
            "htmlcontent2",
            "htmlcontent3",
          ],
          function (newValue, oldValue) {
            if (newValue != oldValue) $scope.saveyes = 1;
          }
        );
      });
    };

    $scope.showevent();

    $scope.saveall = function () {
      $http({
        method: "POST",
        url: "/edit-eventmail",
        data: {
          idevent: window.location.pathname.split("/")[2],
          atitle: $scope.htmlcontent,
          asubtitle: $scope.htmlcontent2,
          atext: $scope.htmlcontent3,
          type: "acknowledgment",
          photo: $scope.myCroppedImageAcknowledgmentf,
        },
      }).then(function (response) {
        if (response.data == 1) {
          $scope.saveyes = 0;
          $scope.url =
            "/mail-acknowledgment/33/" +
            $scope.idevent +
            "?id=" +
            new Date().getTime();
        }
      });
    };

    $scope.test = function () {
      $http({
        method: "POST",
        url: "/test-acknowledgment",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) { });
    };

    var handleFileSelect1 = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.photook = 1;
          $scope.myImage1 = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };
    angular
      .element(document.querySelector("#fileInput1"))
      .on("change", handleFileSelect1);
  },
]);

/*
|
| MESSAGING CONTROLLER
|
*/
sampleApp.controller("MessagingCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) {
    $scope.loading = 1;
    $scope.leftnav = 0;
    $scope.idevent = window.location.pathname.split("/")[2];
    $scope.saveyes = 0;

    $scope.myImageMessaging = "";
    $scope.myCroppedImageMessaging = "";

    start = $interval(function () {
      $scope.loading = 0;
    }, 300);

    $scope.orightml = "";
    $scope.htmlcontent = $scope.orightml;
    $scope.disabled = false;

    $scope.loadiframe = function () {
      $scope.url = "/mail-messaging/fake/" + $scope.idevent;
    };

    $scope.loadiframe();

    $scope.showevent = function () {
      $http({
        method: "POST",
        url: "/show-event",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {

        if (!response.data.paid) {
          if (response.data.trail == 1) {
            //console.log("pass");
          } else {
            $location.path("/pay");
          }
        }

        $scope.htmlcontent = response.data["mtitle"];
        $scope.htmlcontent2 = response.data["msubtitle"];
        $scope.htmlcontent3 = response.data["mtext"];

        $scope.$watchGroup(
          [
            "myCroppedImageMessaging",
            "htmlcontent",
            "htmlcontent2",
            "htmlcontent3",
          ],
          function (newValue, oldValue) {
            if (newValue != oldValue) $scope.saveyes = 1;
          }
        );
      });
    };

    $scope.showevent();

    $scope.guestlist = function () {
      $http({
        method: "POST",
        url: "/all-guests-not-nested",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) {
        $scope.guests = response.data;
      });
    };
    $scope.guestlist();
    $scope.updateAllEmailSelected = function (selected) {
      for (var i = 0; i < $scope.guests.length; i++) {
        if ($scope.guests[i].email) {
          $scope.guests[i].emailselected = selected ? 1 : 0;
        }
      }
    };

    $scope.$watch('selectAllEmails', function (newVal) {
      if (newVal !== undefined) {
        $scope.updateAllEmailSelected(newVal);
      }
    });
    $scope.updateAllPhoneSelected = function (selected) {
      for (var i = 0; i < $scope.guests.length; i++) {
        if ($scope.guests[i].phone) {
          $scope.guests[i].phoneselected = selected ? 1 : 0;
        }
      }
    };

    $scope.$watch('selectAllPhones', function (newVal) {
      if (newVal !== undefined) {
        $scope.updateAllPhoneSelected(newVal);
      }
    });
    $scope.updateAllWhatsappSelected = function (selected) {
      for (var i = 0; i < $scope.guests.length; i++) {
        if ($scope.guests[i].whatsapp) {
          $scope.guests[i].whatsappselected = selected ? 1 : 0;
        }
      }
    };

    $scope.$watch('selectAllWhatsapps', function (newVal) {
      if (newVal !== undefined) {
        $scope.updateAllWhatsappSelected(newVal);
      }
    });
    $scope.selem = function (g) {
      if (g.emailselected == 1) {
        g.emailselected = 0;
      } else {
        g.emailselected = 1;
      }
    };

    $scope.selph = function (g) {
      if (g.phoneselected == 1) {
        g.phoneselected = 0;
      } else {
        g.phoneselected = 1;
      }
    };

    $scope.selem = function (g) {
      if (g.emailselected == 1) {
        g.emailselected = 0;
      } else {
        g.emailselected = 1;
      }
    };

    $scope.selwh = function (g) {
      if (g.whatsappselected == 1) {
        g.whatsappselected = 0;
      } else {
        g.whatsappselected = 1;
      }
    };

    $scope.sendemail = function (guests) {
      $http({
        method: "POST",
        url: "/send-messaging-email",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: guests,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send Email successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
      });
    };
    $scope.sendsms = function (guests) {
      $http({
        method: "POST",
        url: "/send-messaging-sms",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: guests,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send sms successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
      });
    };
    $scope.sendwhatsapp = function (guests) {
      $http({
        method: "POST",
        url: "/send-messaging-whatsapp",
        data: {
          idevent: window.location.pathname.split("/")[2],
          guests: guests,
        },
      }).then(function (response) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Send Whatsapp successfully",
          confirmButtonText: "OK"
        })
        $scope.guestlist();
      });
    };

    $scope.saveall = function () {
      $http({
        method: "POST",
        url: "/edit-eventmail",
        data: {
          idevent: window.location.pathname.split("/")[2],
          mtitle: $scope.htmlcontent,
          msubtitle: $scope.htmlcontent2,
          mtext: $scope.htmlcontent3,
          type: "messaging",
          photo: $scope.myCroppedImageMessaging,
        },
      }).then(function (response) {
        if (response.data == 1) {
          $scope.saveyes = 0;
          $scope.url =
            "/mail-messaging/33/" +
            $scope.idevent +
            "?id=" +
            new Date().getTime();
        }
      });
    };

    $scope.test = function () {
      $http({
        method: "POST",
        url: "/test-messaging",
        data: { idevent: window.location.pathname.split("/")[2] },
      }).then(function (response) { });
    };

    var handleFileSelectmex = function (evt) {
      var file = evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function ($scope) {
          $scope.photook = 1;
          $scope.myImageMessaging = evt.target.result;
        });
      };
      reader.readAsDataURL(file);
    };
    angular
      .element(document.querySelector("#fileInputMessaging"))
      .on("change", handleFileSelectmex);
  },
]);

/*
|
| MESSAGING CONTROLLER
|
*/
sampleApp.controller("TutorialCtrl", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) { },
]);

sampleApp.controller("TutorialCtrlFR", [
  "$scope",
  "$route",
  "$http",
  "$location",
  "$routeParams",
  "$window",
  "$interval",
  function (
    $scope,
    $route,
    $http,
    $location,
    $routeParams,
    $window,
    $interval
  ) { },
]);
