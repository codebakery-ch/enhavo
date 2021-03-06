<?php
/**
 * GroupMenuBuilder.php
 *
 * @since 21/09/16
 * @author gseidel
 */

namespace Enhavo\Bundle\UserBundle\Menu;

use Enhavo\Bundle\AppBundle\Menu\Builder\BaseMenuBuilder;

class GroupMenuBuilder extends BaseMenuBuilder
{
    public function createMenu(array $options)
    {
        $this->setOption('icon', $options, 'users');
        $this->setOption('label', $options, 'group.label.group');
        $this->setOption('translationDomain', $options, 'EnhavoUserBundle');
        $this->setOption('route', $options, 'enhavo_user_group_index');
        $this->setOption('role', $options, 'ROLE_ENHAVO_USER_GROUP_INDEX');
        return parent::createMenu($options);
    }

    public function getType()
    {
        return 'user_group';
    }
}