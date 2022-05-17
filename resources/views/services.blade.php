<x-layouts.header>
  @section('head')
  <link rel="stylesheet" href="{{ asset('files/card.css') }}">
  @endsection
  @section('hero-style')
    style="max-height: 55vh;"
  @endsection
  @section('hero-content')
  <h1>
    <span class="heading__large h1">
      Services Provided
    </span>
    <span class="heading__small h4">
      Servicing Alberta and Western Canada with 24 hour emergency field service.
    </span>
  </h1>
@endsection
</x-layouts.header>
<x-layouts.blank-body>

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md p-2 card vh-50 ">
      <div class="heading">
        <h2 class="heading__text" id="inspections">
          Crane Inspections
        </h2>
        <p class='h4'>Crane inspections are a vital component of their success. Crane inspections are designed to asses the safety of the equipment, wear and tear, and identify maintenace needs. Hillside Equipment is proud to provide a variety of services, to ensure your fleet is running at peak performance.
          <ul>
            <li>10 Year boom</li>
            <li>5 year block and ball</li>
            <li>Load moment indicator</li>
          </ul>
          <ul>
            <li>Annual Structual</li>
            <li>Pre Purchase</li>
            <li>First Step in</li>
          </ul>
        </p>
      </div>
      {{-- Boom inspection --}}
      <x-service-card idtag="10-year-boom" css="boom" heading="10 Year boom" paragraph="Hillside Equipment is the 10 year boom inspection experts, with over 60 boom tear downs, we know the ins and outs of your cranes boom." />
      {{-- Block and Ball --}}
      <x-service-card idtag="5-year-block-and-ball" css="block" heading="5 Year block & Ball" paragraph="Block and Ball inspections ensure that the hook is properly lubricated and within allowable tolerances." />
      {{-- LMI --}}
      <x-service-card idtag="lmi-inspection" css="lmi" heading="LMI Calibrations" paragraph="As the operators best tool in the crane. We ensure these complex devices are functioning properlyaccurately to manufactures specifications." />
      {{-- General Inspections --}}
      <x-service-card idtag="general-inspections" css="inspection" heading="General Inspections" paragraph="Hillside Equipment proudly offers Annual & Pre Purchase inspections. Annual inspections prevent unexpected & costly downtime. We give our clients peace of mind with their equipment."/>
      
      <div class="heading py-5">
        <h2 class="heading__text" id="field-services">
          Field Services
        </h2>
        <p class='h4'>With fully rigged service trucks and technicians that know cranes. From Winnipeg to Williams lake and everywhere in between we got your back.</p>
        <ul class='mt-5'>
          <li>Field Welding</li>
          <li>On-site Servicing</li>
          <li>Hydraulics</li>
          <li>Inspections</li>
        </ul>
      </div>
       {{-- Field Welding --}}
       <x-service-card idtag="field-welding" css="welding" heading="Field Welding" paragraph="We know equipment can breakdown in the field, our mobile field service trucks are equipped with welders to ensure your equipment is back up and running." />
       {{-- On site --}}
       <x-service-card idtag="on-site-servicing" css="onsite" heading="On site Servicing" paragraph="We make it easy. hillside can track hours, plan services.  Maintain your equipment as manufactures require. Giving you a record of services performed & when your next service is due." />
       
       {{-- BEGIN SHOP SERVICES --}}
       <div class="heading py-5">
        <h2 class="heading__text" id="shop-services">
          Shop Services
        </h2>
        <p class='h4'>Located in the heart of Nisku, Alberta. We are proud to offer the following services.</p>
        <ul class='mt-5'>
          <li>Engine Removals/Replacement</li>
          <li>Final Drives &amp; Axels</li>
          <li>Component Rebuilds</li>
          <li>Unit Repairs &amp; Rebuilds</li>
        </ul>
      </div>
      <x-service-card idtag="component-rebuilds" css="component" heading="Component Rebuilds" paragraph="There is no job we can't do. Hillside Equipment proudly offers rebuilds of crane components using OEM parts. " />
      <x-service-card idtag="hydraulic-repair" css="hydraulic" heading="Hydraulic Repair" paragraph="Whether it is Hydraulic Cylinders or Hydraulic hoses, we offer the best parts to ensure your equipment is running 100%." />
      

    </div>
  </div>
</div>
@endsection


</x-layouts.blank-body>
<x-layouts.footer/>