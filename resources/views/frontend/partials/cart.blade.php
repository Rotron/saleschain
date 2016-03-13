<div class="panel panel-success">
    
    <div class="panel-heading" style="height: 35px;"> 
        <b>Your shopping cart:</b>
        <span class=" pull-right clickable" @click="viewCart = false">
            <b>hide <span class="glyphicon glyphicon-resize-small"></span> </b>
        </span>
    </div>

    <div class="panel-body">
        <table class="table">
            <tr v-for = "order in cart" >
                <td> @{{ order.name }} </td>
                <td> @{{ order.price }} </td>
                <td style="width:10%">    
                    <div class="input-group" style="width:100px" >
                        {{-- decrement --}}
                        <span class="input-group-btn">
                            <button class="btn btn-default" v-on:click="order.qty -= 1"
                                    :disabled="order.qty == 1">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                            </button>
                        </span> 
                        {{-- value --}}
                        <input type="text" class="form-control qtyBox" readonly
                                value="@{{order.qty}}" 
                        />
                        {{-- increment --}}
                        <span class="input-group-btn">
                            <button class="btn btn-default" v-on:click="addItem(order)">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </span>
                    </div><!-- /input-group -->
                </td>
                <td style="width: 10%;">
                    <div class="input-group" style="width:100px" >
                        <span class="input-group-btn">
                            &nbsp;&nbsp;
                            <span v-on:click="cart.$remove(order);" aria-hidden="true"
                                style="border-radius: 44px;" 
                                class="glyphicon glyphicon-remove btn btn-sm btn-danger" >
                            </span>
                        </span>
                    </div>
                </td>
            </tr>
            <tr><td colspan="2">--------------------</td><td></td></tr>
            <tr>
                <td><b>TTL:</b></td>
                <td colspan="3"><b class="pull-left">@{{ ttl }}</b></td>
            </tr>
        </table>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" v-on:click="purchase()"> 
                <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> 
                Purchase Items 
            </button>
        </div>
    </div>
</div>