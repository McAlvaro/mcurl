<div class="relative">
    <table class="table w-full text-sm text-left">
        <thead>
            <tr>
                <th scope="col" class="px-6">

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach( $urls as $url )
                <tr class="border-t @if( $url_selected == $url->id ) m-bg-primary-1 @endif hover:m-bg-primary-1" wire:click="setUrlSelected({{ $url->id }})">
                    <td scope="row" class="px-6 py-4 m-text-primary font-medium">
                        <a href="#">
                            <div class="w-full h-full">
                                <span class="text-xs m-text-secondary font-light" >{{ strtoupper( $url->parseCreatedAt()) }}</span> <br>
                                <span class="text-ellipsis overflow-hidden line-clamp-1 text-lg font-semibold"> {{ $url->title ? $url->title : 'Untitled' }} </span> <br class="m-0 p-0">
                                <span> <x-icons.link class="h-6 w-auto inline" /> </span>
                                <span class="text-base font-extrabold text-transparent bg-clip-text bg-gradient-to-r m-from-pink m-to-blue"> {{ env('APP_DOMAIN').'/'. $url->code }}</span>
                                <span class="float-right"> {{ $url->click_counter }} <i class="fa-solid fa-chart-simple ml-1"></i></span>
                            </div>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
