@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Geneology</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
			 <div class="card">
      <div class="card-header">
        <h3 class="card-title">Geneology</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <style>
/*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
  padding-top: 20px; position: relative;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree li {
  float: left; text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 5px 0 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1px solid #ccc;
  width: 50%; height: 20px;
}
.tree li::after{
  right: auto; left: 50%;
  border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
  border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1px solid #ccc;
  width: 0; height: 20px;
}

.tree li a{
  border: 1px solid #ccc;
  padding: 5px 10px;
  text-decoration: none;
  color: #666;
  font-family: arial, verdana, tahoma;
  font-size: 11px;
  display: inline-block;
  
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
  background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
  border-color:  #94a0b4;
}
</style>

<div class="tree">

<div class="tree" style="text-align: center;">
  <ul>
    <li>
      
      <a href="{{ url()->current() }}?r={{ $primarymember->id }}" title="{{ $primarymember->referral_id }}"><img style="border-radius: 50%; padding: 4px; margin: 0; box-sizing: border-box; " src="@if($primarymember->photo !== NULL) {{ $primarymember->photo }} @else {{ asset('dist/img/member.jpg') }} @endif" width="70" height="70" alt="{{ $primarymember->name }}" /><br>{{ $primarymember->name }}</a>


<ul>

@foreach($members['u'.$primarymember->id] as $m)

    <li>
<!--       <a href="{{ url()->current() }}?r={{ $m['id'] }}">{{ $m['id'] }}</a>
 -->

      <a href="{{ url()->current() }}?r={{ $m['id'] }}" title="{{ $m['referral_id'] }}"><img style="border-radius: 50%; padding: 4px; margin: 0; box-sizing: border-box; " src="@if($m['photo'] !== NULL) {{ $m['photo'] }} @else {{ asset('dist/img/member.jpg') }} @endif" width="70" height="70" alt="{{ $m['name'] }}" /><br>{{ $m['name'] }}</a>

      <ul>

{{-- @foreach($members['u'.$m['id']] as $s)
        <li>
                <a href="{{ url()->current() }}?r={{ $s['id'] }}" title="{{ $s['referral_id'] }}"><img style="border-radius: 50%; padding: 4px; margin: 0; box-sizing: border-box; " src="@if($s['photo'] !== NULL) {{ $s['photo'] }} @else {{ asset('dist/img/member.jpg') }} @endif" width="70" height="70" alt="{{ $s['name'] }}" /></a>
          <ul>

            @foreach($members['u'.$s['id']] as $v)
            <li>
                <a href="{{ url()->current() }}?r={{ $v['id'] }}" title="{{ $v['referral_id'] }}"><img style="border-radius: 50%; padding: 4px; margin: 0; box-sizing: border-box; " src="@if($v['photo'] !== NULL) {{ $v['photo'] }} @else {{ asset('dist/img/member.jpg') }} @endif" width="70" height="70" alt="{{ $v['name'] }}" /></a>
            </li>
            @endforeach

          </ul>
        </li>

@endforeach --}}


          </ul>
    </li>

@endforeach
</ul>
    </li>

          </ul>
</div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
	  
	  
	  
@endsection