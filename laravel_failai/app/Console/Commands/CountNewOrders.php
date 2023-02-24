<?php

namespace App\Console\Commands;

use App\Managers\OrdersManager;
use App\Models\Status;
use Illuminate\Console\Command;

class CountNewOrders extends Command
{

    /**
     * The name and signature of the console command.
     */
    protected $signature = 'orders:count {type? : Užsakymo statuso pavadinimas}';

    /**
     * The console command description.
     */
    protected $description = 'Skaičiuojam naujus uzsakymus';

    public function __construct(private readonly OrdersManager $ordersManager)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $kokius = $this->argument('type');

        if (!isset($kokius)) {
            $kokius = $this->choice('Kokius uzsakymus skaiciuoti?', [
                'new',
                'in_progress',
                'confirmed',
                'canceled',
                'done',
            ]);
        }

        $statusId = Status::where(['name' => $kokius])->first()?->id;

        $orders = $this->ordersManager->getByStatus($statusId);

        $kiekis = count($orders);
        $bar = $this->output->createProgressBar($kiekis);
        $bar->start();
        $this->newLine();

        $this->info("Nauju uzsakymu busenoje [$kokius] yra: $kiekis");
        $this->newLine();

        $bar->advance();
        sleep(1);
        $bar->advance();
        sleep(1);
        $bar->advance();
        sleep(1);
         $bar->advance();
        sleep(1);
        $bar->finish();
        $this->newLine(2);

        $this->table([
            'id',
            'user_id',
            'shipping_address_id',
            'billing_address_id',
            'status_id',
            'created_at',
            'updated_at',
        ], $orders);

        return Command::SUCCESS;
    }
}
