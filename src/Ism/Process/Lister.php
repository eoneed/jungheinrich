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
class Lister extends Command {

    /**
     * @throws \Exception
     */
    protected function configure()
    {
        $this->setName('list');
        $this->setDescription('List all rides');
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $storage = Config::getInstance()->getStorage();

        $table = new Table($output);
        $table->setHeaders([
            'ID', 'Driver', 'Vehicle', 'Started', 'Finished'
        ]);
        $table->setRows($storage->getRides());
        $table->render();
    }
}
