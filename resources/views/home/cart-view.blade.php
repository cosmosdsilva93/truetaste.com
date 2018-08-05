@if(isset($cart) && count($cart) > 0)
    @php
        $i = 1;
    @endphp
    @foreach($cart as $itemId => $itemDetails)
    <div class="the-menu-item" style="padding:0" data-product={{ $itemId }}>
        <div class="the-menu-body">
            <span class="menu-title" style="display:inline-block;width:60%;">{{ ucwords($itemDetails['item']) }}</span>
            
            <span style="display:inline-block;width:10%;">X</span>
    
            <span>
                <input type="number" min="1" style="width: 15%;" value="{{ $itemDetails['quantity'] }}">
            </span>
        </div>
        <div class="prices" style="top:12px !important">
            <span class="price">${{ number_format($itemDetails['price'] * $itemDetails['quantity'], 2) }}</span>
        </div> 
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="newPrice_{{ $i }}" value="{{ number_format($itemDetails['price'] * $itemDetails['quantity'], 2) }}">
        <input type="hidden" name="items[]" value="{{ $itemId }}">
        <input type="hidden" name="quantity[]" value="{{ $itemDetails['quantity'] }}">

        <input type="hidden" name="item_name_{{ $i }}" value="{{ ucwords($itemDetails['item']) }}">
        <input type="hidden" name="amount_{{ $i }}" value="{{ number_format($itemDetails['price'], 2) }}">
        <input type="hidden" name="quantity_{{ $i }}" value="{{ $itemDetails['quantity'] }}">
        @php
            $totalBill[] = $itemDetails['price'] * $itemDetails['quantity']; 
        @endphp
    </div>
    @php
        $i++;
    @endphp
    @endforeach
    <div class="the-menu-item" style="padding:0" >
        <div class="the-menu-body" style="padding:10px 0 !important;">
            <span class="menu-title" style="display:inline-block;width:80%;">Total</span>
        </div>
        <div class="prices" style="top:8px !important">
            <input type="hidden" name="total_amount" value="{{ array_sum($totalBill) }}">
            <span class="price">${{ number_format(array_sum($totalBill), 2) }}</span>
        </div> 
    </div> 
    <div class="the-menu-item" style="padding:20px 60px">
        <div class="the-menu-body" style="padding:10px 0 !important;">
            <span class="menu-title">Enter Your Details -</span>
        </div>
        <input type="text" name="name" class="form-control" value="{{ isset($_SESSION['userDetails']) ? $_SESSION['userDetails']['first_name'] . ' ' . $_SESSION['userDetails']['last_name'] : '' }}" required="required" placeholder="Name*">
        <input type="email" name="email" style="margin-top: 10px;" class="form-control" value="{{ isset($_SESSION['userDetails']) ? $_SESSION['userDetails']['email'] : '' }}" required="required" placeholder="Email*">
        <textarea name="address" id="" style="margin-top: 10px;background-color: #eee;border: 0 none;color: #262626;font-size: 14px;font-weight: 600;letter-spacing: 1px;" class="form-control" rows="3" required="required" placeholder="Address*"></textarea>
    </div>   
@else
    <div class="alert alert-danger" align="center">
       <span>Nothing added in cart.</span>
    </div>
@endif 