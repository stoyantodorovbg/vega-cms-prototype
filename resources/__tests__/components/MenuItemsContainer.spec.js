import { mount } from '@vue/test-utils';
import MenuItemsContainer from "../../js/components/menu/MenuItemsContainer";

describe("MenuItemsContainer Component", () => {
  test('should mount without crashing', () => {
    const wrapper = mount(MenuItemsContainer);

    expect(wrapper).toMatchSnapshot();
  });
});
