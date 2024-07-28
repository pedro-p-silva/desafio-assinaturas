<?php

namespace App\Console\Commands;

use App\Models\Api\Signature;
use Illuminate\Console\Command;
use App\Models\Api\Invoice;
use Illuminate\Database\Eloquent\Collection;

class Convert_signatures_to_invoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert_signatures_to_invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $signatures = $this->unconvertedSignatures();

        $addTenDays = addAnotherTenDays();

        foreach ($signatures as $signature) {
            if ($addTenDays == $signature->due_date) {
                Invoice::create([
                    'register' => $signature->register,
                    'signature' => $signature->id,
                    'description' => $signature->description,
                    'due_date' => $signature->due_date,
                    'price' => $signature->price
                ]);

                Signature::query()
                    ->where('id', '=', $signature->id)
                    ->update([
                        'converted_to_invoice' => 1
                    ]);
            }
        }
    }

    /**
     * Checking unconverted signatures
     *
     * @return Collection|array
     */
    private function unconvertedSignatures(): Collection|array
    {
        return Signature::query()
            ->select( 'id', 'register', 'description', 'due_date', 'price')
            ->where('status', '=', 1)
            ->where('converted_to_invoice', '=', null)
            ->orderBy('id', 'ASC')
            ->get();
    }
}
