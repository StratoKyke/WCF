<?php
namespace wcf\acp\page;
use wcf\data\object\type\ObjectTypeCache;
use wcf\system\exception\PermissionDeniedException;

/**
 * Shows an attachment.
 * 
 * @author	Marcel Werk
 * @copyright	2001-2013 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf.attachment
 * @subpackage	acp.page
 * @category	Community Framework
 */
class AttachmentPage extends \wcf\page\AttachmentPage {
	/**
	 * @see	wcf\page\IPage::checkPermissions()
	 */
	public function checkPermissions() {
		if ($this->attachment->tmpHash) {
			throw new PermissionDeniedException();
		}
		
		// check private status of attachment's object type
		$objectType = ObjectTypeCache::getInstance()->getObjectType($this->attachment->objectTypeID);
		if ($objectType->private) {
			throw new PermissionDeniedException();
		}
	}
}
