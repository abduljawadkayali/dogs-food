

@extends('layouts.User')
@include('include.footer')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{!! mix('js/app.js') !!}"> </script>

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-bone"></i> @lang("Ai solution")</h1>
 <hr>


 <div id="app" v-cloak>
 <div class="sk-rotating-plane"></div>

    <table v-if="state" id="myTable1" class="table display nowrap" >
                <thead>
                <tr>
                    <th>@lang("Specific")</th>
                    <th>@lang("Value")</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>@lang("Price")</td>
                    <td> @{{ msg.result }}</td>
                </tr>


                    <tr>
                     <td> @{{ keys[3] }}</td>
                       <td> @{{ values[3] }}</td>
                       </tr>

                      @if(@values[4] )
                       <tr>
                        <td> @{{ keys[4] }}</td>
                        <td> @{{ values[4] }}</td>
                        </tr>
                       @endif
                        @if(@values[5]>0 )
                           <tr>
                            <td> @{{ keys[5] }}</td>
                              <td> @{{ values[5] }}</td>
                            </tr>
                          @endif

                              @if(@values[6]>0 )
                              <tr>
                               <td> @{{ keys[6] }}</td>
                                <td> @{{ values[6] }}</td>
                                </tr>
                                @endif
                                @if(@values[7]>0 )
                                <tr>
                                    <td> @{{ keys[7] }}</td>
                                    <td> @{{ values[7] }}</td>
                                    </tr>
                                     @endif
                                     @if(@values[8]>0 )
                                     <tr>
                                        <td> @{{ keys[8] }}</td>
                                        <td> @{{ values[8] }}</td>
                                      </tr>
                                      @endif
                                      @if(@values[9]>0 )
                                      <tr>
                                      <td> @{{ keys[9] }}</td>
                                      <td> @{{ values[9] }}</td>
                                      </tr>
                                      @endif
                                        @if(@values[10]>0 )
                                         <tr>
                                          <td> @{{ keys[10] }}</td>
                                          <td> @{{ values[10] }}</td>
                                          </tr>
                                          @endif
                                        @if(@values[11]>0 )
                                        <tr>
                                        <td> @{{ keys[11] }}</td>
                                        <td> @{{ values[11] }}</td>
                                        </tr>
                                         @endif

                                         @if(@values[12]>0 )
                                          <tr>
                                          <td> @{{ keys[12] }}</td>
                                          <td> @{{ values[12] }}</td>
                                          </tr>
                                           @endif
                                          @if(@values[13]>0 )
                                            <tr>
                                            <td> @{{ keys[13] }}</td>
                                            <td> @{{ values[13] }}</td>
                                            </tr>
                                             @endif
                                             @if(@values[14]>0 )
                                                 <tr>
                                                 <td> @{{ keys[14] }}</td>
                                                 <td> @{{ values[14] }}</td>
                                                 </tr>
                                                  @endif
                                             @if(@values[15]>0 )
                                                  <tr>
                                                  <td> @{{ keys[15] }}</td>
                                                  <td> @{{ values[15] }}</td>
                                                  </tr>
                                                   @endif
                                                  @if(@values[16]>0 )
                                                  <tr>
                                                  <td> @{{ keys[16] }}</td>
                                                  <td> @{{ values[16] }}</td>
                                                  </tr>
                                                   @endif
                                               @if(@values[17]>0 )
                                        <tr>
                                        <td> @{{ keys[17] }}</td>
                                        <td> @{{ values[17] }}</td>
                                        </tr>
                                         @endif
                                          @if(@values[18]>0 )
                                              <tr>
                                              <td> @{{ keys[18] }}</td>
                                              <td> @{{ values[18] }}</td>
                                              </tr>
                                               @endif
                                         @if(@values[19]>0 )
                                                 <tr>
                                                 <td> @{{ keys[19] }}</td>
                                                 <td> @{{ values[19] }}</td>
                                                 </tr>
                                                  @endif
                                             @if(@values[20]>0 )
                                                <tr>
                                                <td> @{{ keys[20] }}</td>
                                                <td> @{{ values[20] }}</td>
                                                </tr>
                                                 @endif
                                             @if(@values[21]>0 )
                                                   <tr>
                                                   <td> @{{ keys[21] }}</td>
                                                   <td> @{{ values[21] }}</td>
                                                   </tr>
                                                    @endif
                                              @if(@values[22]>0 )
                                                      <tr>
                                                      <td> @{{ keys[22] }}</td>
                                                      <td> @{{ values[22] }}</td>
                                                      </tr>
                                                       @endif
                                          @if(@values[23]>0 )
                                                    <tr>
                                                    <td> @{{ keys[23] }}</td>
                                                    <td> @{{ values[23] }}</td>
                                                    </tr>
                                                     @endif
                                                    @if(@values[24]>0 )
                                                   <tr>
                                                   <td> @{{ keys[24] }}</td>
                                                   <td> @{{ values[24] }}</td>
                                                   </tr>
                                                    @endif
                                             @if(@values[25]>0 )
                                                     <tr>
                                                     <td> @{{ keys[25] }}</td>
                                                     <td> @{{ values[25] }}</td>
                                                     </tr>
                                                      @endif
            </table>


    <h1 v-else>


          Oh no 😢</h1>

        <div>
   </div>

</div>
<div class="row">




<a href="{{ URL::to('Ai/create') }}" class="btn btn-primary">@lang("Ai solution")</a>
<br><br>
@endsection
