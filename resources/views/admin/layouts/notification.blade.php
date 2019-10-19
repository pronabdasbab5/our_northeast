<li role="presentation" class="dropdown">
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-envelope-o"></i>
        <span class="badge bg-green">
        	{{-- ({{ ($newBookingData['newJeepBookingData'] + $newBookingData['newBoatBookingData'] + $newBookingData['newPackageBookingData']) > 0? ($newBookingData['newJeepBookingData'] + $newBookingData['newBoatBookingData'] + $newBookingData['newPackageBookingData']): 0  }}) --}}
        </span>
       {{--  @if($newBookingData['newJeepBookingData'] > 0 || $newBookingData['newBoatBookingData'] > 0)
        	<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
        		@if($newBookingData['newJeepBookingData'] > 0)
        			<li><a href="{{ route('new_jeep_booking') }}"><b>({{ $newBookingData['newJeepBookingData'] }}) New Safari Booking</b></a></li>
        		@endif
        		@if($newBookingData['newBoatBookingData'] > 0)
        			<li><a href="{{ route('new_boat_booking') }}"><b>({{ $newBookingData['newBoatBookingData'] }}) New Boat Booking </b></a></li>
        		@endif
                @if($newBookingData['newPackageBookingData'] > 0)
                    <li><a href="{{ route('new_package_booking') }}"><b>({{ $newBookingData['newPackageBookingData'] }}) New Package Booking </b></a></li>
                @endif
        	</ul>
        @endif --}}
    </a>
</li>