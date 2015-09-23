<?php namespace BestServedCold\PhalueObjects\Utilities\Configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Definition implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('phalueObjects');
        $rootNode
            ->children()
                ->arrayNode('language')
                    ->isRequired()
                    ->children()
                        ->scalarNode('locale')
                            ->isRequired()
                            ->defaultValue('en_GB')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
