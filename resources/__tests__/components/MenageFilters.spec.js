import { mount } from '@vue/test-utils';
import MenageFilters from "../../js/components/filters/MenageFilters";

describe("ManageFilters Component", () => {
  test('should mount without crashing', () => {
      const wrapper = mount(MenageFilters);
      expect(wrapper).toMatchSnapshot();
  });
});
