import { mount } from '@vue/test-utils';
import MenuItem from "../../js/components/menu/MenuItem";

describe("MenuItem Component", () => {
  test('should mount without crashing', () => {
    const wrapper = mount(MenuItem);

    expect(wrapper).toMatchSnapshot();
  });
});
