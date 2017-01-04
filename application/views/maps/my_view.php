	<div class="container-fluid">
		<?php 
			if(!empty($identitasdok)){
				echo "<span><h1>";
				echo $identitasdok;
				echo "</h1></span>";
			}
		?>    
		<div class="row content">
			<div class="col-md-6" style="height:641.72px;"> 
				<?php echo $map['html']; ?>
			</div>
			<div class="col-md-6 sidenav">
				<div class="row">
					<?php
						echo "<h1 style=\"vertical-align:middle; text-align:center; font-family: bebas neue;\">";
						if(!empty($gelardok)){
							$temp = "List ".$gelardok." Terdekat";
							echo $temp;
						}
						else{
							echo "List Dokter Terdekat";
						}
						echo "</h1>";
					?>
				</div>
				<div class="row">
					<a href="<?php echo base_url("/maps/dr.Umum"); ?>"><div class="col-md-6 div-umum">
						<h2 style="text-align: center">UMUM</h2>
					</div></a>
					<a data-toggle="modal" data-target="#myModal"><div class="col-md-6 div-umum">
						<h2 style="text-align: center">SPESIALIS</h2>
					</div></a>
					<div id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Pilih Spesialis</h4>
								</div>
								<form action='' id="formSpesialis">
									<div class="modal-body" id="containSelector">

										<select id="spesialisSelector" style="width: 150px; height: 25px;">
											<option value="#">--Pilih Spesialis--</option>
											<?php foreach ($data_gelar as $value) { 
												if($value['Gelar'] != "dr.Umum") {
											?>
											<option value="<?php echo $value['Gelar'] ?>"><?php echo $value['Gelar'] ?></option>
											<?php } } ?>
										</select>
										

									</div>
									<div class="modal-footer">
										<button id="btn" class="btn btn-primary" action="submit">Search</button>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
				<br>
				<div class="row" id="listdokter" style="overflow:scroll; height:489px;">
					
				</div>
			</div>
		</div>
		<div id="directionsDiv"></div>
	</div>
	<script>
		//var currentdate = new Date();
		var currentdate = new Date('2017','0','2','11','10');
		console.log(currentdate);
		var days = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU'];

		function compareDist(a,b) {
		  if (a.distance > b.distance)
		    return 1;
		  if (a.distance < b.distance)
		    return -1;
		  return 0;
		}

		function compareOpen(a,b) {
		  return (a.buka === b.buka)? 0 : a.buka? -1 : 1;
		}

		function GoogleMapDistance(YourLatLong,DestLatLong,DestID,DestNama,DestGelar,DestFoto,DestTempat,DestOpen,DestClosed,item)
			{
			    var service = new google.maps.DistanceMatrixService();
			    service.getDistanceMatrix(
			    {
				    origins: [YourLatLong],
				    destinations: DestLatLong,
				    travelMode: google.maps.TravelMode.DRIVING,
				    unitSystem: google.maps.UnitSystem.METRIC,
				    avoidHighways: false,
				    avoidTolls: false
			    }, function callback(response, status)
				    {
				        if (status != google.maps.DistanceMatrixStatus.OK) {
				            alert('Error was: ' + status);
				        }
				        else {
					        var origins = response.originAddresses;
					        var destinations = response.destinationAddresses;
					        var outputDiv = document.getElementById(item);
					        outputDiv.innerHTML = '';
					        var array = [];
					          for (var i = 0; i < origins.length; i++)
					          {
					              var results = response.rows[i].elements;
					              for (var j = 0; j < results.length; j++)
					              {
					              	  var open = false;
					              	  if(DestOpen[j] != '-' && DestClosed[j] != '-') {
					              	  	var openhour = Date.parseExact(DestOpen[j],"HH:mm").getHours();
					              	  	var closedhour = Date.parseExact(DestClosed[j],"HH:mm").getHours();
					              	  	var nowhour = currentdate.getHours();
					              	  	if(nowhour > openhour && nowhour <= closedhour) {
					              	  		open = true;
					              	  	}
					              	  }
					              	  
					                  var element = results[j];
					                  array.push({ nama: DestNama[j], gelar: DestGelar[j], foto: DestFoto[j], idt: DestID[j], tempat: DestTempat[j], buka: open, from: origins[i], to: destinations[j], distance: element.distance.text, duration: element.duration.text });
					              }
					          }
					        array.sort(compareDist);
					        array.sort(compareOpen);
					        console.log(array);
					        for (var i = 0; i < array.length; i++) {
					        	var status = "";
					        	if (!array[i].buka) {
					        		status = "(CLOSED)"
					        	}
					        	outputDiv.innerHTML += '<div class="col-md-6">' + "<a href=" + '"' + "<?php echo base_url('maps'); ?>" + "/" + array[i].gelar + "/" + array[i].nama + "/" + array[i].idt + '"' + ">" + 
					        	'<div class="card"><div class="card-image"><img src="http://localhost/Findoct/uploads/doctors/' +
					        	array[i].foto + '" alt="foto" width="100%" height="auto" /><span class="card-title styleclass">' + array[i].nama + ', ' + array[i].gelar + ' ' + status + '</span></div><div class="card-content"><p>' + 
					        	array[i].tempat + ': ' + array[i].distance + '&nbsp; (<i>' + array[i].duration + '</i>)</p></div></div></a></div>'    	
					        }
				        }
				    }
				)
			}

		navigator.geolocation.getCurrentPosition(function(position) {
			var YourLatLong = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			var DestLatLong1 = [];
			var DestID = [];
			var DestNama = [];
			var DestGelar = [];
			var DestFoto = [];
			var DestTempat = [];
			var DestOpen = [];
			var DestClosed = [];
			<?php foreach ($places as $places_item){ ?>
				var dayname = days[currentdate.getDay() - 1];
				var jadwal = '-';
				if (dayname == 'SENIN') {
					jadwal = <?php echo '"'.$places_item['SENIN'].'"'?>;
				} else if (dayname == 'SELASA') {
					jadwal = <?php echo '"'.$places_item['SELASA'].'"'?>;
				} else if (dayname == 'RABU') {
					jadwal = <?php echo '"'.$places_item['RABU'].'"'?>;
				} else if (dayname == 'KAMIS') {
					jadwal = <?php echo '"'.$places_item['KAMIS'].'"'?>;
				} else if (dayname == 'JUMAT') {
					jadwal = <?php echo '"'.$places_item['JUMAT'].'"'?>;
				}

				if (jadwal != '-') {
					var temp = jadwal.split(" - ");
					DestOpen.push(temp[0]);
					DestClosed.push(temp[1]);
				} else {
					DestOpen.push('-');
					DestClosed.push('-');
				}

				DestID.push(<?php echo '"'.$places_item['IDT'].'"'?>);
				DestNama.push(<?php echo '"'.$places_item['EMAIL'].'"'?>);
				DestGelar.push(<?php echo '"'.$places_item['GELAR'].'"'?>);
				DestFoto.push(<?php echo '"'.$places_item['FOTO'].'"'?>);
				<?php if(!empty($places_item['KODEPOS'])){ ?>
					DestLatLong1.push(<?php echo '"'.$places_item['ALAMAT'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].', '.$places_item['KODEPOS'].'"'?>);
					DestTempat.push(<?php echo '"'.$places_item['NAMATPRAKTEK'].', '.$places_item['ALAMAT'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].', '.$places_item['KODEPOS'].'"'?>);
				<?php } ?>
				<?php if(empty($places_item['KODEPOS'])){ ?>
					DestLatLong1.push(<?php echo '"'.$places_item['ALAMAT'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].'"'?>);
					DestTempat.push(<?php echo '"'.$places_item['NAMATPRAKTEK'].', '.$places_item['ALAMAT'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].'"'?>);
				<?php }
			} ?>
				    
			GoogleMapDistance(YourLatLong,DestLatLong1,DestID,DestNama,DestGelar,DestFoto,DestTempat,DestOpen,DestClosed,"listdokter");
		});
	</script>