<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Encoder;

trigger_deprecation('symfony/security-core', '5.3', sprintf('The "%s" interface is deprecated, use "%s" on hasher implementations that deal with salts instead.', UserPasswordEncoderInterface::class, UserPasswordHasherInterface::class));

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * UserPasswordEncoderInterface is the interface for the password encoder service.
 *
 * @author Ariel Ferrandini <arielferrandini@gmail.com>
 *
 * @deprecated since Symfony 5.3, use {@link UserPasswordHasherInterface} instead
 */
interface UserPasswordEncoderInterface
{
    /**
     * Encodes the plain password.
     *
     * @return string The encoded password
     */
    public function encodePassword(UserInterface $user, string $plainPassword);

    /**
     * @return bool true if the password is valid, false otherwise
     */
    public function isPasswordValid(UserInterface $user, string $raw);

    /**
     * Checks if an encoded password would benefit from rehashing.
     */
    public function needsRehash(UserInterface $user): bool;
}
