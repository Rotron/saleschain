@extends('layouts.app')
@section('title', ' - Search')
@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">Dashboard</div> -->
            <div class="panel-body">
                <br>
                <div class="row">
                    
                    <div class="form-group">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                        
                            <input v-model="search" style="margin-left: 40px;" autofocus 
                                class='form-control' placeholder="Search items">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <select v-model="category"
                                class="form-control" id="category" name="category">
                               
                                <option value="0">All Categories</option>
                                <option v-for="cat in cats" v-bind:value="cat.id">
                                    @{{ cat.name }}
                                </option>

                            </select>
                        </div>
                        <div class="col-md-2">
                            <button v-on:click="goGetEm()" 
                                class="btn btn-success pull-left"> 
                               <span class="glyphicon glyphicon-search"></span>  Search 
                            </button>
                        </div>
                    </div>
                </div>
            </div> <!-- end of panel-body -->
        </div>  <!-- end of panel (search) -->
    </div> <!-- end of col -->
</div> <!-- end of row -->

<div v-show="items.length > 0" class="row">
    
    <div v-show="cart.length > 0" class="row pull-right"> 
        <h3 class="clickable" v-on:click="viewCart = true">
            <span class="glyphicon glyphicon-shopping-cart"></span> Cart (@{{cart.length}})
        </h3> 
    </div>

    <div v-show="viewCart" class="col-md-6 col-md-offset-3">
        @include('frontend.partials.cart')
    </div>


    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <h4 class="clickable" v-on:click="sortBy('name')">
                            <span class="glyphicon glyphicon-gift"></span>&nbsp; Item
                            <span v-show="sortKey == 'name' ">
                                <span  class="glyphicon" 
                                    v-bind:class="[(orderKey == 1) ? 
                                                'glyphicon-sort-by-alphabet' : 
                                                'glyphicon-sort-by-alphabet-alt']">
                                </span> 
                            </span>
                        </h4>
                    </th>
                    <th>   
                        <h4 class="clickable" v-on:click="sortBy('price')">
                            <span class="glyphicon glyphicon-usd"></span>&nbsp; Price
                            <span v-show="sortKey == 'price' ">
                                <span  class="glyphicon" 
                                    v-bind:class="[(orderKey == 1) ? 
                                                'glyphicon-sort-by-alphabet' : 
                                                'glyphicon-sort-by-alphabet-alt']">
                                </span> 
                            </span>
                        </h4>
                    </th>
                    <th><h4><span class="glyphicon glyphicon-credit-card"></span>&nbsp; Action</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for = "(index, item) in items | orderBy sortKey orderKey" >
                    <td> @{{ item.name }} </td>
                    <td>$  @{{ item.price }} </td>               
                    <td>
                        <div class="form-inline">
                            <!-- <input v-bind:value="current.qty"
                                class="form-control qtyBox" type="text" />
                            &nbsp;&nbsp; -->
                            <button v-on:click="addItem(item)"
                                class="form-controlbtn btn btn-success" > 
                                <span class="glyphicon glyphicon-plus"></span> 
                                 Add To Cart
                            </button>
                        </div>
                    </td>       
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection


@section('scripts')
<script src="/js/frontend/store.js"> </script>

@stop