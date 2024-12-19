<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showForm()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $userCart = $user->carts()->firstOrCreate(['status' => 'N']);

        if ($userCart->products->isEmpty())
            return redirect('/');

        $subTotal = $userCart->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });

        return view('checkout', [
            'user' => $user,
            'subTotal' => $subTotal,
        ]);
    }

    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address_line' => 'required|max:255',
            'city' => 'required|max:255',
            'postal_code' => 'required|numeric|digits:5',
            'country' => 'required|max:255',
            'mobile' => 'required|numeric|digits:10',
            'cod' => 'required|boolean',
        ]);

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $userCart = $user->carts()->firstWhere('status', 'N');

        if (!$userCart || $userCart->products->isEmpty())
            return redirect('/');

        $subTotal = $userCart->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });

        $order = $user->orders()->create(array_merge($request->except(['cod', '_token']), [
            'status' => 'N',
            'grand_total' => $subTotal,
        ]));

        foreach ($userCart->products as $product) {
            $order->products()->attach($product->id, [
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'discount' => 0,
            ]);
        }

        $transaction = new Transaction();
        $transaction->mode = 'COD'; // Later add different payment methods
        $transaction->status = 'N';

        $order->transactions()->save($transaction);

        $userCart->status = 'C'; // Mark the cart as completed
        $userCart->save();

        // Generate and display the PDF
        return $this->generateOrderPDF($order);
    }

    private function generateOrderPDF(Order $order)
    {
        // Define the HTML content for the PDF
        $htmlContent = view()->make('pdf.order', ['order' => $order])->render();

        // Generate the PDF using Barryvdh\DomPDF
        $pdf = Pdf::loadHTML($htmlContent);

        // Return the PDF as a downloadable file or inline view
        return $pdf->stream('order_receipt.pdf');
    }
}
