<?php
namespace Ism\Process;

/**
 *
 */
use Ism\Config;
use Ism\Validator;
use Ism\Entity\Ride;
use Ism\Entity\Driver;
use Ism\Entity\Vehicle;

use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;

/**
 *
 */
class Register extends Command {

    /**
     * @throws \Exception
     */
    protected function configure()
    {

        $this->setName('register');
        $this->setDescription('Register a ride');

        $this->addArgument('driver',
            InputArgument::REQUIRED,
            'The driver (Length 8, A-Z, 0-9)'
        );

        $this->addArgument('vehicle',
            InputArgument::REQUIRED,
            'The vehicle (Length 14, A-Z, 0-9)'
        );

        $this->addArgument('started',
            InputArgument::REQUIRED,
            'Start of ride ('.\DateTime::W3C.')'
        );

        $this->addArgument('finished',
            InputArgument::REQUIRED,
            'End of ride ('.\DateTime::W3C.')'
        );
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $validator = new Validator();

        /* --- */
        $driver = new Driver([
            'id' => $input->getArgument('driver')
        ]);
        $validator->validate($driver);

        /* --- */
        $vehicle= new Vehicle([
            'id' => $input->getArgument('vehicle')
        ]);
        $validator->validate($vehicle);

        /* --- */
        $ride = new Ride([
            'driver'   => $driver,
            'vehicle'  => $vehicle,
            'started'  => $input->getArgument('started'),
            'finished' => $input->getArgument('finished')
        ]);
        $validator->validate($ride);

        /**
         *
         */
        Config::getInstance()->getStorage()->addRide($ride);
        Config::getInstance()->getQueue()->addRide($ride);

        /**
         *
         */
        if ($output->isVerbose()) {
            $this->display($output, $ride);
        }
    }

    /**
     *
     */
    protected function display($output, $ride)
    {
        $table = new Table($output);
        $table->setHeaders([
            'ID', 'Driver', 'Vehicle', 'Started', 'Finished'
        ]);
        $table->setRows([
            [
                $ride->getId(),
                $ride->getDriver()->getId(),
                $ride->getVehicle()->getId(),
                $ride->getStarted(),
                $ride->getFinished()
            ]
        ]);
        $table->render();
    }
}
