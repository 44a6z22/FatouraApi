@extends('layout')
@section('info')
    	{{-- <div class="maincard"> --}}
			<table border="0" width="90%" align="center" style="text-align:left;">
				<tbody>

					{{-- header  --}}
					<tr >
						<td style="padding-bottom:100px;" scope="row" width="50%">
							<h1 id="title">Facture {{$data->id}} </h1>
							<h1 id="date">{{$data->created_at}}</h1>
									
						</td>
						<td style="text-align: center; padding-bottom:100px;">
							<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/1200px-Instagram_logo_2016.svg.png" width="100px" height="100px" alt="Fatourat logo">
						</td>
					</tr>

					
					{{-- info --}}
					<tr >
						<td scope="row">
							<div class="info-people">
								<strong class="from"> From :</strong>
							</div>
							<div class="From-info" style="margin-left: 5%;">
							
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												{{$data->user->name}} 
								</p>
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												{{$data->user->email}}
								</p>
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												212000101999
								</p>
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												{{$data->user->User_Ville}}, Maroc
								</p>
							</div>
						</td>
						<td>
							<div class="info-people">
								<strong class="to" > To :</strong>
							</div>
							<div class="From-info" style="margin-left: 5%;">

								@if($data->client != null)
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->client->Client_Nom ." " . $data->client->Client_Nom}} 
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{ $data->client->Client_Prenom }}
									</p>
									
									@foreach($data->client->nums as $number)	
										<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
														{{$number->Num_value}}
										</p>
									@endforeach

									@foreach($data->client->adresses as $adrs)
										<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
														{{$adrs->Adress_value}}
										</p>
									@endforeach 
								@else
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->societe->name}} 
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->societe->email}}
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													212000101999
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->societe->User_Ville}}, Maroc
									</p>
								@endif
							</div>
						</td>
					</tr>
					
					
					{{-- details  --}}
					<tr>
						<td scope="row" colspan="2" style="">
							<h3 style="text-align: left; margin-top:40px;" id="detail">DETAILS</h3>
							<table  border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding table">
								<thead>
									<tr>
										<th scope="col" class="table-header"><strong>Description</strong></th>
										<th scope="col" class="table-header"> <strong>Total excl tax </strong></th>
									</tr>
								</thead>
								<tbody>
									@foreach($data->articles as $articles)
									<tr>
                                        <td class="table-data">{{$articles->type_articles->article_type_value}}</td>
										<td class="table-data">{{$articles->}}</td>
									</tr>

									@endforeach
								</tbody>
							</table>
						</td>
			
					</tr>



					{{-- Total cost  --}}
					
					<tr style="text-align:right;">
						<td scope="row">
						
						</td>
						<td >
							<div > 
								<table width="100%" style="margin-top:30px;">
									
									<tbody>
										<tr>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">total </td>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right;">450 dh</td>
										</tr>
										<tr>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; "><strong>Somme Total (Avec.Taxe) </strong> </td>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right;">844.90 dh
										</td>
										</tr>
										
										<tr>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">TAXE </td>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right;">	72.40 dh</td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>
					</tr>

					{{-- terms  --}}
					<tr>
						<td scope="row" colspan="2" width="100%">
							<h3 style="text-align: left; " id="conditions">CONDITIONS</h3>
							<div>
								<table class="" >
									
									<tbody>
										<tr id="S1">
											<td style=" font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;"><strong>CONDITIONS DE RÈGLEMENT:</strong> </td>
											<td style=" font-size: 12px; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">{{$data->reglements->condition_reglement->Condition_value}}</td>
										</tr>
										<tr id="S1">
											<td style=" font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;"><strong>MODE DE RÈGLEMENT :</strong> </td>
											<td style=" font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">{{$data->reglements->mode_reglement->mode_value}}</td>
										</tr>
										
									
									</tbody>
								</table>
							</div>
						</td>
					</tr>


				</tbody>
			</table>	
		{{-- </div> --}}
@endsection
