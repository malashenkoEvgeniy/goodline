
<div class="breadcrumbs">
   <ol itemscope itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
         <a href='{{ LaravelLocalization::localizeUrl("/") }}' itemprop="item"> 
            <span class="breadcrumbs__home-title" itemprop="name">@lang('main.main')</span> 
         </a>
         <meta itemprop="position" content="1" />
      </li>
     

      @if($breadcrumbs->parent !== null)
      @php
         $i = 2
      @endphp

         @foreach($breadcrumbs->parent as $key => $parent)

         <li class="bread-sep"> @include('frontend.includes.svg.dropdown_angle') </li>
         <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href='{{ LaravelLocalization::localizeUrl("$parent->url") }}' itemprop="item" >
               <span itemprop="name">{{ $parent->translate()->page_title }} </span>
            </a>
            <meta itemprop="position" content="{{$i}}" />
         </li>
         @php $i++ @endphp
         @endforeach
      @endif


      <li class="bread-sep"> @include('frontend.includes.svg.dropdown_angle') </li>
      <li class="current"> {{$breadcrumbs->current}} </li>
   </ol>
</div>

