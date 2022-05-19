<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MemberProductSorting {

    public function byFeatured(): LengthAwarePaginator
    {
        return Auth::guard('member')
                ->user()
                ->store
                ->products()
                ->orderBy('view')
                ->orderBy('sold')
                ->paginate(20);
    }

    public function byTopSell(): LengthAwarePaginator
    {
        return Auth::guard('member')
                ->user()
                ->store
                ->products()
                ->orderByDesc('sold')
                ->paginate(20);
    }

    public function byPriceLowToHigh(): LengthAwarePaginator
    {
        return Auth::guard('member')
                ->user()
                ->store
                ->products()
                ->orderBy('latest_price')
                ->paginate(20);
    }

    public function byPriceHighToLow(): LengthAwarePaginator
    {
        return Auth::guard('member')
                ->user()
                ->store
                ->products()
                ->orderByDesc('latest_price')
                ->paginate(20);
    }

    public function byCodeNumber(string $codeNumber): LengthAwarePaginator
    {
        return Auth::guard('member')
                ->user()
                ->store
                ->products()
                ->where('code_number', $codeNumber)
                ->paginate(20);
    }
}
