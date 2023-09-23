@extends('admin.master.index')
@section('title')
    Subcategory
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">{{$subcategory->name}} Subcategory Details</h3>
            <a href="{{route('subcategory.index')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Manage</a>
        </div>
        <div class="card-body">
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At fuga fugiat numquam, repellat sed totam ut vel. Aliquam dolore illo itaque magni officia repellendus sapiente totam velit veritatis vero. Adipisci asperiores cumque deserunt dolor doloribus excepturi fugiat hic magni modi nam odio, odit officiis perspiciatis quam ullam veniam vero voluptate. Accusamus aliquid atque dignissimos dolor eaque error, expedita in ipsam ipsum nam natus porro, repellat tenetur! Adipisci aliquam at consequatur deserunt ex incidunt laudantium recusandae sapiente sed? Ad alias assumenda facere maiores quidem totam voluptate? Architecto doloremque nulla quam rerum unde veniam voluptate! Architecto at aut deserunt dicta doloremque ea earum esse ex hic, illo ipsam iure, libero, maiores minima nobis nostrum nulla optio pariatur provident quia quis quo recusandae repellendus reprehenderit sit tempora temporibus! Consequatur, dolorem ea eaque, error eum facilis harum ipsum magnam nemo numquam qui soluta tempore unde vel voluptas. Asperiores autem consectetur consequuntur corporis deleniti deserunt dolores, eveniet, impedit ipsa iste maxime minus natus necessitatibus nihil numquam officiis quibusdam similique temporibus vel voluptate! Aliquam maiores nulla rem voluptas voluptate. A assumenda cumque cupiditate facilis ipsum laborum quam quidem saepe, voluptatibus. Molestiae molestias omnis possimus, quis quisquam sunt ut. Cum harum hic incidunt numquam praesentium sequi similique.</p>
        </div>
    </div>
@endsection
