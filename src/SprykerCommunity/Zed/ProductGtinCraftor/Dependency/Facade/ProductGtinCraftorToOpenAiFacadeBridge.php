<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade;

use Generated\Shared\Transfer\OpenAiAssignEventToPromptRequestTransfer;
use Generated\Shared\Transfer\OpenAiCreateResponseTransfer;
use Generated\Shared\Transfer\OpenAiExecuteRequestTransfer;
use Generated\Shared\Transfer\OpenAiPromptCriteriaTransfer;
use Generated\Shared\Transfer\OpenAiPromptTransfer;

class ProductGtinCraftorToOpenAiFacadeBridge implements ProductGtinCraftorToOpenAiFacadeInterface
{
    /**
     * @var \ValanticSpryker\Zed\OpenAi\Business\OpenAiFacadeInterface
     */
    protected $openAiFacade;

    /**
     * @param \ValanticSpryker\Zed\OpenAi\Business\OpenAiFacadeInterface $openAiFacade
     */
    public function __construct($openAiFacade)
    {
        $this->openAiFacade = $openAiFacade;
    }

    /**
     * @param int $idOpenAi
     *
     * @return \Generated\Shared\Transfer\OpenAiPromptTransfer|null
     */
    public function findByOpenAiPromptById(int $idOpenAi): ?OpenAiPromptTransfer
    {
        return $this->openAiFacade->findByOpenAiPromptById($idOpenAi);
    }

    /**
     * @param \Generated\Shared\Transfer\OpenAiPromptCriteriaTransfer $openAiPromptCriteriaTransfer
     *
     * @return array|null
     */
    public function getOpenAiPromptCollection(OpenAiPromptCriteriaTransfer $openAiPromptCriteriaTransfer): ?array
    {
        return $this->openAiFacade->getOpenAiPromptCollection($openAiPromptCriteriaTransfer);
    }

    /**
     * @return array|null
     */
    public function getOpenAiPromptToEventCollection(): ?array
    {
        return $this->openAiFacade->getOpenAiPromptToEventCollection();
    }

    /**
     * @param \Generated\Shared\Transfer\OpenAiPromptTransfer $openAiTransfer
     *
     * @return \Generated\Shared\Transfer\OpenAiPromptTransfer|null
     */
    public function createOpenAi(OpenAiPromptTransfer $openAiTransfer): ?OpenAiPromptTransfer
    {
        return $this->openAiFacade->createOpenAi($openAiTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\OpenAiPromptTransfer $openAiTransfer
     *
     * @return \Generated\Shared\Transfer\OpenAiPromptTransfer|null
     */
    public function updateOpenAi(OpenAiPromptTransfer $openAiTransfer): ?OpenAiPromptTransfer
    {
        return $this->openAiFacade->updateOpenAi($openAiTransfer);
    }

    /**
     * @param int $idOpenAi
     *
     * @return bool
     */
    public function deleteOpenAi(int $idOpenAi): bool
    {
        return $this->openAiFacade->deleteOpenAi($idOpenAi);
    }

    /**
     * @param \Generated\Shared\Transfer\OpenAiAssignEventToPromptRequestTransfer $assignEventToPromptRequestTransfer
     *
     * @return bool
     */
    public function assignEventToPrompt(OpenAiAssignEventToPromptRequestTransfer $assignEventToPromptRequestTransfer): bool
    {
        return $this->openAiFacade->assignEventToPrompt($assignEventToPromptRequestTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\OpenAiExecuteRequestTransfer $executeRequestTransfer
     *
     * @return \Generated\Shared\Transfer\OpenAiCreateResponseTransfer
     */
    public function executePromptAction(OpenAiExecuteRequestTransfer $executeRequestTransfer): OpenAiCreateResponseTransfer
    {
        return $this->openAiFacade->executePromptAction($executeRequestTransfer);
    }

}