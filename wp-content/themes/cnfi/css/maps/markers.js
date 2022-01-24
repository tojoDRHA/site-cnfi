$("#btnSearch").click(function(){
	chargerListeInstitution();
});

function getDistrict(_iRegionId){
	$("#isDistrict").hide();
	$("#iDistrictId").html('<option value="0">Tous</option>');
	$.ajax(
        {
            type: 'post',
            url: window.urlFrontAjax,
            data: {
                action: 'load_district',
				iRegionId : _iRegionId,
            },
            success: function (response) {
				$("#iDistrictId").html(response);
                $("#isDistrict").show();
            }
        }
    );
}

function changeAll(){
	$("#iRegionId").val(0);
	$("#iDistrictId").val(0);
	$("#iCommuneId").val(0);
	$("#isCommune").hide();
	$("#isDistrict").hide();
}

function getCommune(_iDistrictId){
	$("#isCommune").hide();
	$("#iCommuneId").html('<option value="0">Tous</option>');
	$.ajax(
        {
            type: 'post',
            url: window.urlFrontAjax,
            data: {
                action: 'load_commune',
				iDistrictId : _iDistrictId,
            },
            success: function (response) {
				$("#iCommuneId").html(response);
                $("#isCommune").show();
            }
        }
    );
}
function chargerListeInstitution() {
   
	$(".leaflet-marker-icon").remove();
	$(".leaflet-popup").remove();
	$.ajax(
        {
            type: 'post',
            url: window.urlFrontAjax,
            data: {
                action: 'load_searchInstitution_results',
				iTypeId : $("#iTypeId").val(),
				iRegionId : $("#iRegionId").val(),
				iDistrictId : $("#iDistrictId").val(),
				iCommuneId : $("#iCommuneId").val(),
				zSearchAdvenced : $("#zSearchAdvenced").val(),
            },
            success: function (response) {
                toResult = response;
				$(".leaflet-marker-icon").remove();
				$(".leaflet-popup").remove();


				if($("#iRegionId").val()>0){
					var target = L.latLng(toResult[0].latitudeR, toResult[0].longitudeR);
					map.setView(target, 7);
				} else {
					var target = L.latLng('-18.879172', '47.508859');
					map.setView(target, 6);
				}

                for (var i = 0; i < toResult.length; i++) {
                    
                    var myIcon = L.icon({
					  iconUrl: myURL + 'images/'+toResult[i].pin,
					  iconRetinaUrl: myURL + 'images/'+toResult[i].pin,
					  iconSize: [29, 24],
					  iconAnchor: [9, 21],
					  popupAnchor: [0, -14]
					})
                    marker = L.marker([toResult[i].latitude, toResult[i].longitude], {
                        title: toResult[i].nom + " : " + toResult[i].commune,
                        icon: myIcon
                    }).addTo(map);

					

                    text = '<b>' + toResult[i].nom + '</b><br>';
					text += 'Latitude: ' + toResult[i].latitude + '<br>';
					text += 'Longitude: ' + toResult[i].longitude + '<br>';
                    text += 'Type: ' + toResult[i].entite + '<br>';
                    text += 'Commune: ' + toResult[i].commune + '<br>';
                    text += 'District: ' + toResult[i].district + '<br>';
                    text += 'Region: ' + toResult[i].region + '<br>';
                    text += 'Province: ' + toResult[i].province + '<br>';
                    marker.bindPopup(text);
                    map.addLayer(marker);

                } 
            }
        }
    );

}

